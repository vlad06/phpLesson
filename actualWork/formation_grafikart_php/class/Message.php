<?php

class Message {
  
  //*************CONSTANTS*****************/
  const LIMIT_USERNAME = 3;
  const LIMIT_MESSAGE = 10;

  //*************PROPERTIES****************/
  private $username; // string
  private $message; // string
  private $date; // DateTime

  //*************CONSTRUCTOR*************/
  public function __construct(string $username, string $message, ?DateTime $date = null) { 
    $this->username = $username;
    $this->message = $message;
    // $this->date = (!$date) ? date("d-m-Y H:i") : $date; // si $date = null, $date = date du jour
    $this->date = $date ?? new DateTime();
  }

  //*************METHODS*****************/

  public function isValid(): bool { // est-ce que le pseudo et le message sont valides nb char etc...
    return empty($this->getErrors());
  }

  public function getErrors(): array {  // retourne tableau contenant les erreurs pseudo et où message
    $errors = [];

    if(strlen($this->username) < self::LIMIT_USERNAME) {
      $errors["username"] = "Votre pseudo est trop court";
    }

    if(strlen($this->message) < self::LIMIT_MESSAGE) {
      $errors["message"] = "Votre message est trop court";
    }

    return $errors;
  }

  public function toHTML(): string {  // convertit le message en html sous la forme : 
    //  <p>
    //    <strong>Pseudo</strong> <em>le 06/06/2020 à 09:03</em><br />
    //    Le message
    //  </p>
    $username = htmlentities($this->username);
    $this->date->setTimezone(new DateTimeZone("Europe/Paris"));
    $date = $this->date->format("d/m/Y à H:i");
    $message = nl2br(htmlentities($this->message));
    return <<<HTML
    <p>
      <strong>{$username}</strong> <em>le {$date}</em><br />
      {$message}
    </p>
    HTML;
  }

  public function toJSON(): string {
    $table = [
      "username" => $this->username,
      "message" => $this->message,
      "date" => $this->date->getTimestamp()
    ];
    return json_encode($table);
  }

  public static function fromJSON(string $json): Message {
    $data = json_decode($json, true);
    return new self($data["username"], $data["message"], new DateTime("@" . $data["date"]));
  }

}