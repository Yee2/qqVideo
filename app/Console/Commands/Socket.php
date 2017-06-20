<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Socket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $master = stream_socket_server("tcp://127.0.0.1:8081", $errno, $errstr);
        if (!$master) {
            echo "$errstr ($errno)<br />\n";
        } else {
            $sockets = [];
            $block = stream_set_blocking($master, 0);
            $sockets[] = $master;
            while (true)
            {
                $write = null;
                $error = null;
                stream_select($sockets, $write, $error, null);
                foreach ($sockets as $key => $socket)
                {
                    var_dump($socket);
                    if($socket === $master)
                    {
                        $conn = stream_socket_accept($socket);
                        if($conn < 0){ continue; }

                        $buffer = stream_socket_recvfrom($conn, 1024);
                        $headData = self::parseHead($buffer);
                        $handshake_message = self::dohandshake($headData['Sec-WebSocket-Key']);
                        stream_socket_sendto ($conn,  $handshake_message);
                        array_push($sockets, $conn);
                    }else
                    {
                        $buffer = stream_socket_recvfrom($socket, 1024);
                        if(strlen($buffer) === 0)
                        {
                            echo self::decode($buffer);
                        }else{
                            $content = self::decode($buffer);
                            if(is_null($content))
                            {
                                var_dump($error);
                                //unset($sockets[$key]);
                                //fclose($socket);
                            }else{
                                var_dump($error);
                                var_dump(self::decode($buffer));
                                stream_socket_sendto ($socket,  self::frame('你好啊'));
                            }
                        }
                    }
                }
            }
        }
    }

    private static function frame($s) {
        $a = str_split($s, 125);
        if (count($a) == 1) {
            return "\x81" . chr(strlen($a[0])) . $a[0];
        }
        $ns = "";
        foreach ($a as $o) {
            $ns .= "\x81" . chr(strlen($o)) . $o;
        }
        return $ns;
    }
    private static function decode($buffer)  {
        $len = $masks = $data = $decoded = null;
        $len = ord($buffer[1]) < 127;
        if ($len === 126)  {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8);
        } else if ($len === 127)  {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14);
        } else  {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6);
        }
        for ($index = 0; $index < strlen($data); $index++) {
            $decoded .= $data[$index] ^ $masks[$index % 4];
        }
        return $decoded;
    }

    private static function dohandshake($key)
    {
        $new_key = base64_encode(sha1($key . "258EAFA5-E914-47DA-95CA-C5AB0DC85B11", true));
        $handshake_message = "HTTP/1.1 101 Switching Protocols\r\n";
        $handshake_message .= "Upgrade: websocket\r\n";
        $handshake_message .= "Sec-WebSocket-Version: 13\r\n";
        $handshake_message .= "Connection: Upgrade\r\n";
        $handshake_message .= "Server: workerman/1.1\r\n";
        $handshake_message .= "Sec-WebSocket-Accept: " . $new_key . "\r\n\r\n";
        return $handshake_message;
    }
    private static function parseHead($buffer){
        $dataArr = explode('
', $buffer);
        $dataKeyVals = [];
        foreach ($dataArr as $key => $val)
        {
            $trim = trim($val);
            if(empty($trim)){
                unset($dataArr[$key]);
            }else{
                if(strpos($val, ':') > 0)
                {
                    $explode = explode(': ', $trim);
                    $dataKeyVals[$explode[0]] = $explode[1];
                }
            }
        }
        return $dataKeyVals;
    }
}
