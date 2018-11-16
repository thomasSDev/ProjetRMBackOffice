<?php
namespace app\WebService\modules\WebService;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\Client;
use \entity\Message;
use \formBuilder\MessageFormBuilder;
use \formBuilder\ClientFormBuilder;
use \fram\FormHandler;
 
class WebServiceController extends BackController
{
 
  public function executeInsertDonnees(HTTPRequest $request)
  {
    //Client traitement
    
    if ($request->method() == 'POST')
    {
      $client = new Client([
        'nom' => $request->postData('nom'),
        'prenom' => $request->postData('prenom'),
        'adresse' => $request->postData('adresse'),
        'cp' => $request->postData('cp'),
        'ville' => $request->postData('ville'),
        'tel' => $request->postData('tel'),
        'mail' => $request->postData('mail')
      ]);
      
    }
    $clientGetByMail = $this->managers->getManagerOf('Client')->getByMail($client['mail']);

    if(empty($clientGetByMail))
    {
      $formBuilder = new ClientFormBuilder($client);
      $formBuilder->build();
    
      $form = $formBuilder->form();
      
      $formHandler = new FormHandler($form, $this->managers->getManagerOf('Client'), $request);
      if ($formHandler->process())
      {
        $clientSend = true;     
      }
    }
    
    else if (!empty($clientGetByMail))
    {
      $client = $clientGetByMail;
      $clientSend = true;
    }    
    
    
    
    if($clientSend)
    {

      $clientMail = $this->managers->getManagerOf('Client')->getByMail($client['mail']);

      // Traitement du message

      $message = new Message([
        'typeDemande' => $request->postData('typeDemande'),
        'typeIntervention' => $request->postData('typeIntervention'),
        'disponibilite' => $request->postData('disponibilite'),
        'message' => $request->postData('message'),
        'idClient' => $clientMail['id'],
        'demandeTraitee' => false

      ]);
      if($message['typeIntervention'] == null)
      {
        $message['typeIntervention'] = 'Non précisé';
      }
      
      $this->managers->getManagerOf('Message')->insert($message);

      //envoi de mail au propriétaire de l'application
      $emailAddress = /*"Adresse de l'admin site"*/; 

      $emailSubject = 'Message client ' . $client['prenom'] . ' ' . $client['nom'] . ' ' . $message['typeDemande'];

      $emailMessage = '
                      <html>
                        <head>
                          <meta charset="utf-8">
                        </head>
                        <header style="font-size: 1.5em; font-weight : bold;">
                          Vous avez un nouveau message client
                        </header>
                        <body>
                          <p style="font-size: 1.2em;">Coordonnées client</p>

                          <table>
                            <tr>
                              <td>Nom</td><td>' . $client['nom'] . '</td>
                            </tr>
                            <tr>
                              <td>Prénom</td><td>' . $client['prenom'] . '</td>
                            </tr>
                            <tr>
                              <td>Adresse</td><td>'.$client['adresse'] . '</td>
                            </tr>
                            <tr>
                              <td>Code postal</td><td>'.$client['cp'] . '</td>
                            </tr>
                            <tr>
                              <td>Ville</td><td>'.$client['ville'] . '</td>
                            </tr>
                            <tr>
                              <td>Téléphone</td><td>'.$client['tel'] . '</td>
                            </tr>
                            <tr>
                              <td>Email</td><td>'.$client['mail'] . '</td>
                            </tr>
                          </table>

                          <p style="font-size: 1.2em;">Message client</p>

                          <table>
                            <tr>
                              <td>Type de demande</td><td>'.$message['typeDemande'] . '</td>
                            </tr>
                            <tr>
                              <td>Type d\'intervention</td><td>'.$message['typeIntervention'] . '</td>
                            </tr>
                            <tr>
                              <td>Disponibilité</td><td>'.$message['disponibilite'] . '</td>
                            </tr>
                            <tr>
                              <td>Message</td><td>'.$message['message'] . '</td>
                            </tr>
                          </table>

                        </body>
                      </html>
                      ';

      $emailHeader  = 'MIME-Version: 1.0' . "\r\n";
      $emailHeader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $emailHeader .= 'From: Raphael Maguer NoReply </*Adresse no reply du site */>' . "\r\n";
      
      mail($emailAddress, $emailSubject, $emailMessage, $emailHeader);              

      //envoi de mail de confirmation au client
      $emailClientAddress = $client['mail']; 
      $emailClientSubject = 'Confirmation de votre demande';
      $emailClientMessage = '
                      <html>
                        <head>
                          <meta charset="utf-8">
                        </head>
                        <body>
                        <h1 style="font-size:1.25em;">Vous venez d\'effectuer une demander auprès de l\'entreprise Raphaël Maguer plomberie / chauffage</h1><br/>
                        <p>Bonjour, <br/><br/>
                        Je vous confirme la bonne réception de votre demande. Celle-ci sera traitée dans les plus bref délais.<br/>
                        Voici les détails de la demande : </p>
                        <table>
                            <tr>
                              <td>Nom</td><td>' . $client['nom'] . '</td>
                            </tr>
                            <tr>
                              <td>Prénom</td><td>' . $client['prenom'] . '</td>
                            </tr>
                            <tr>
                              <td>Adresse</td><td>'.$client['adresse'] . '</td>
                            </tr>
                            <tr>
                              <td>Code postal</td><td>'.$client['cp'] . '</td>
                            </tr>
                            <tr>
                              <td>Ville</td><td>'.$client['ville'] . '</td>
                            </tr>
                            <tr>
                              <td>Téléphone</td><td>'.$client['tel'] . '</td>
                            </tr>
                            <tr>
                              <td>Email</td><td>'.$client['mail'] . '</td>
                            </tr>
                          </table>

                          <p style="font-size: 1.2em;">Message client</p>

                          <table>
                            <tr>
                              <td>Type de demande</td><td>'.$message['typeDemande'] . '</td>
                            </tr>
                            <tr>
                              <td>Type d\'intervention</td><td>'.$message['typeIntervention'] . '</td>
                            </tr>
                            <tr>
                              <td>Disponibilité</td><td>'.$message['disponibilite'] . '</td>
                            </tr>
                            <tr>
                              <td>Message</td><td>'.$message['message'] . '</td>
                            </tr>
                          </table>

                        <p>Cordialement,</p>
                        <p>Raphaël Maguer<br/>
                        plomberie chauffage<br/>
                        Tel : 06 79 49 62 37<br/></p><br/><br/>

                        <p>Ceci est un message envoyé automatiquement, veuillez ne pas répondre.</p>
                      </body>
                      </html>
                      ';
      $emailClientHeader  = 'MIME-Version: 1.0' . "\r\n";
      $emailClientHeader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $emailClientHeader .= 'From: Raphael Maguer NoReply </*Adresse no reply du site*/>' . "\r\n";  
      mail($emailClientAddress, $emailClientSubject, $emailClientMessage, $emailClientHeader);

      // Renvoi page d'accueil du site web avec message ok dans l'url pour le message de confirmation pour le client
      header('Location: http://raphaelmaguer-plombierchauffagiste.fr/index.php/contact/?message=ok');
        
      
     exit; 
    }
    
    
  }
  
}
