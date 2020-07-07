<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "functions.php";
require_once "Message.php";

class GuestBook {

  private $file; // string

  public function __construct(string $file) {

    $directory = dirname($file);      // path of the directory containing the file used to register the messages
    if(!is_dir($directory)) {         // if the directory doesn't exist
      mkdir($directory, 0777, true);  // create it
    }
    if(!file_exists($file)) {         // if the file doesn't exist
      touch($file);                   // create it
    }
    $this->file = $file;
  }

  public function addMessage(Message $message): void {  // save the message in the file
    file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND); // "\n" for jumping a line (LF, Line Feed), instead PHP_EOL can be used
  }

  public function getMessages(): array {

    $content = trim(file_get_contents($this->file));
    $lines = explode(PHP_EOL, $content);
    $messages = [];
    foreach($lines as $line) {
      $messages[] = Message::fromJSON($line);
    }
    return array_reverse($messages);
  }


}