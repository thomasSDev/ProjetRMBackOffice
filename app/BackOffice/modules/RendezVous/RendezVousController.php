<?php
namespace app\BackOffice\modules\RendezVous;
 
use \fram\BackController;
use \fram\HTTPRequest;
use \entity\RendezVous;
use \formBuilder\RendezVousFormBuilder;
use \fram\FormHandler;
 
class RendezVousController extends BackController
{
  public function executeDeleteRendezVous(HTTPRequest $request)
  {
    $rendezVousId = $request->getData('id');
 
    $this->managers->getManagerOf('RendezVous')->delete($rendezVousId);
 
    $this->app->users()->setFlash('<div class="alert alert-danger" role="alert">le rendez-vous a bien été supprimée !</div>');
 
    $this->app->httpResponse()->redirect('.');
  }
 
  public function executeCalendrier(HTTPRequest $request)
  {
    //rendez-vous prochains
    $elementsPerPage = $this->app->config()->get('nombre_elements');

    $manager = $this->managers->getManagerOf('RendezVous');

    $rendezVousProchains = $manager->getListProchain(0,$elementsPerPage);

    $i = 0;
    
    foreach($rendezVousProchains as $rdvProchains)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($rdvProchains['idClient_Rdv']);
      $rendezVousProchains[$i]->client = $client;
      $i++;
    }
    $this->page->addVar('listeRendezVousProchains', $rendezVousProchains);

    //rednez-vous précédents

    $manager = $this->managers->getManagerOf('RendezVous');

    $rendezVousPrecedents = $manager->getListPrecedent(0,$elementsPerPage);

    $i = 0;
    
    foreach($rendezVousPrecedents as $rdvPrecedents)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($rdvPrecedents['idClient_Rdv']);
      $rendezVousPrecedents[$i]->client = $client;
      $i++;
    }
    $this->page->addVar('listeRendezVousPrecedents', $rendezVousPrecedents);

    //rendez-vous sur le planning
    $manager = $this->managers->getManagerOf('RendezVous');

    $rendezVousListe = $manager->getListCalendrier();

    $i = 0;
    //client du rendez-vous
    foreach($rendezVousListe as $rdvListe)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($rdvListe['idClient_Rdv']);
      $rendezVousListe[$i]->client = $client;
      $i++;
    }
    $this->page->addVar('rendezVousListe', $rendezVousListe);

    $num_semaine = date('W', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
    $semaineSuivanteUrl = $request->getData('pagesuivante');
    $semainePrecedenteUrl = $request->getData('pageprecedente');

    //traitement semaine suivante
    if($semaineSuivanteUrl)
    {
      $semaineUrlIncremente = $semaineSuivanteUrl +1;
      $semaineUrlDecremente = $semaineSuivanteUrl -1;
      $coeffMultiplicateurSemaine = $semaineSuivanteUrl * 7;
      $semaineSuivante = date('W', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
      $semaineDiff = $semaineSuivante - $num_semaine;
      $num_semaine = $semaineSuivante;
    }

    //traitement semaine précédente
    else if($semainePrecedenteUrl)
    {
      $semaineUrlIncremente = $semainePrecedenteUrl -1;
      $semaineUrlDecremente = $semainePrecedenteUrl +1;
      $coeffMultiplicateurSemaine = $semainePrecedenteUrl * 7 * -1;
      $semainePrecedente = date('W', mktime(0, 0, 0, date("m")  , date("d")+$coeffMultiplicateurSemaine, date("Y")));
      $num_semaine = $semainePrecedente;

    }

    //traitement semaine courrante
    else
    {
      $semaineSuivante = date('W', mktime(0, 0, 0, date("m")  , date("d")+7, date("Y")));
      $semainePrecedente = date('W', mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")));
      $semaineDiff = $semaineSuivante - $num_semaine;
      $semaineDiffNegatif = $semainePrecedente - $num_semaine;
    }
    

    $this->page->addVar('getNumSemaineSuivante', $request->getData('pagesuivante'));
    $this->page->addVar('getNumSemainePrecedente', $request->getData('pageprecedente'));
    $this->page->addVar('num_semaine', $num_semaine);
    $this->page->addVar('semaineDiff', $semaineDiff);
    $this->page->addVar('semaineDiffNegatif', $semaineDiffNegatif);
    $this->page->addVar('semaineSuivante', $semaineSuivante);
    $this->page->addVar('semainePrecedente', $semainePrecedente);
    $this->page->addVar('coeffMultiplicateurSemaine', $coeffMultiplicateurSemaine);
    $this->page->addVar('semaineUrlIncremente', $semaineUrlIncremente);
    $this->page->addVar('semaineUrlDecremente', $semaineUrlDecremente);


    //PLANNING V2
    /*$manager = $this->managers->getManagerOf('RendezVous');

    $rendezVousPlanning = $manager->getListPlanning();

    $i = 0;
    
    foreach($rendezVousPlanning as $rdvPlanning)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($rdvPlanning['idClient_Rdv']);
      $rendezVousPlanning[$i]->client = $client;
      $i++;
    }
    $this->page->addVar('rendezVousPlanning', $rendezVousPlanning);*/

  }

  public function executeListeRendezVousPrecedent(HTTPRequest $request)
  {
    //Historique des rendez-vous
    $this->page->addVar('title', 'Historique des rendez-vous');
    $manager = $this->managers->getManagerOf('RendezVous');
    
    
    //pagination
    
    $elementsPerPage = $this->app->config()->get('nombre_elements');
    $totalElements = $manager->countPrecedentRDV();
    $nbPages = ceil($totalElements/$elementsPerPage);

    if($request->getData('page') > 0 && $request->getData('page') <= $nbPages)
    {
      $currentPage = $request->getData('page');
    }
    else
    {
      $currentPage = 1;
    }

    //Liste des rendez-vous
    

    $rendezVousPrecedents = $manager->getListPrecedent(($currentPage-1)*$elementsPerPage, $elementsPerPage);

    $i = 0;
    
    foreach($rendezVousPrecedents as $rdvPrecedents)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($rdvPrecedents['idClient_Rdv']);
      $rendezVousPrecedents[$i]->client = $client;
      $i++;
    }
    $this->page->addVar('listeRendezVousPrecedents', $rendezVousPrecedents);
    
    $this->page->addVar('nombreRendezVous', $totalElements);
    $this->page->addVar('nbPages', $nbPages);
    $this->page->addVar('currentPage', $currentPage);
  }

  public function executeListeRendezVousFutur(HTTPRequest $request)
  {
    //Historique des rendez-vous
    $this->page->addVar('title', 'Liste des prochains rendez-vous');
    $manager = $this->managers->getManagerOf('RendezVous');
    
    
    //pagination
    
    $elementsPerPage = $this->app->config()->get('nombre_elements');
    $totalElements = $manager->countProchainsRDV();
    $nbPages = ceil($totalElements/$elementsPerPage);

    if($request->getData('page') > 0 && $request->getData('page') <= $nbPages)
    {
      $currentPage = $request->getData('page');
    }
    else
    {
      $currentPage = 1;
    }

    //Liste des rendez-vous
    

    $rendezVousProchains = $manager->getListProchain(($currentPage-1)*$elementsPerPage, $elementsPerPage);

    $i = 0;
    
    foreach($rendezVousProchains as $rdvProchains)
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($rdvProchains['idClient_Rdv']);
      $rendezVousProchains[$i]->client = $client;
      $i++;
    }
    $this->page->addVar('listeRendezVousProchains', $rendezVousProchains);
    
    $this->page->addVar('nombreRendezVous', $totalElements);
    $this->page->addVar('nbPages', $nbPages);
    $this->page->addVar('currentPage', $currentPage);
  }
  public function executeDetailsRendezVous(HTTPRequest $request)
  {
    $rendezVous = $this->managers->getManagerOf('RendezVous')->getUnique($request->getData('id'));
 
    if (empty($rendezVous))
    {
      $this->app->httpResponse()->redirect404();
    }
    $this->page->addVar('rendezVous', $rendezVous);

    $client = $this->managers->getManagerOf('Client')->getUnique($rendezVous['idClient_Rdv']);

    $this->page->addVar('client', $client);

  }

  public function executeInsertRendezVous(HTTPRequest $request)
  {
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {

      $rendezVous = new RendezVous([
        'idClient_Rdv' => $request->getData('idClient_Rdv'),
        'dateHeure' => $request->postData('dateHeure'),
        'typeIntervention' => $request->postData('typeIntervention'),
        'commentaire' => $request->postData('commentaire')
      ]);
    }
    else
    {
      $rendezVous = new RendezVous;
    }
 
    $formBuilder = new RendezVousFormBuilder($rendezVous);
    $formBuilder->build();
 
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('RendezVous'), $request);
    
 
    if ($formHandler->process())
    {
      //envoi mail propriétaire du site
      $client = $this->managers->getManagerOf('Client')->getUnique($rendezVous['idClient_Rdv']);
      $dateHeureRendezVous = $rendezVous['dateHeure'];
      $dateHeureRdvCast = date('d/m/Y à H:i', strtotime($dateHeureRendezVous));

      $emailAddress = "sutre.thomas.29@gmail.com"; 
      $emailSubject = 'Rendez-vous avec '. $client['prenom'] . ' ' . $client['nom'] . ' le ' . $dateHeureRdvCast;
      $emailMessage = '
                      <html>
                        <header style="font-size: 1.3em; font-weight : bold;">
                          Vous avez un nouveau rendez-vous plannifé
                        </header>
                        <body>
                          <p style="font-size: 1.2em;">Coordonnées client</p>

                          <table>
                            <tr>
                              <td style="text-decoration:underline">Nom</td><td>' . $client['nom'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Prénom</td><td>' . $client['prenom'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Adresse</td><td>'. $client['adresse'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Code postal</td><td>'. $client['cp'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Ville</td><td>'. $client['ville'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Téléphone</td><td>'. $client['tel'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Email</td><td>'. $client['mail'] . '</td>
                            </tr>
                          </table>

                          <p style="font-size: 1.2em;">Nature du rendez-vous</p>

                          <table>

                            <tr>
                              <td style="text-decoration:underline">Type d\'intervention</td><td>'.$rendezVous['typeIntervention'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Date et heure</td><td>'. $dateHeureRdvCast . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Commentaire</td><td>'. $rendezVous['commentaire'] . '</td>
                            </tr>
                          </table>

                        </body>
                      </html>
                      ';

      $emailHeader  = 'MIME-Version: 1.0' . "\r\n";
      $emailHeader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $emailHeader .= 'From: Raphael Maguer NoReply <rmaguer@backoffice.com>' . "\r\n";
      
      mail($emailAddress, $emailSubject, $emailMessage, $emailHeader);   

      //envoi mail client

      $emailClientAddress = $client['mail']; 
      $emailClientSubject = 'Rendez-vous Raphaël Maguer plomberie chauffage ' . ' le ' . $dateHeureRdvCast;
      $emailClientMessage = '
                      <html>
                        <body>
                        <h1 style="font-size:1.25em;">Notification d\'intervention plomberie / chauffage</h1><br/>
                        <p>Bonjour, <br/><br/>
                        un rendez-vous a été plannifié avec votre plombier chauffagiste le <span style="font-weight:bold;">'.$dateHeureRdvCast.'</span>.<br/>
                        Voici les détails du rendez-vous : </p>
                        <table>

                          <tr>
                            <td style="text-decoration:underline">Type d\'intervention</td><td>'.$rendezVous['typeIntervention'] . '</td>
                          </tr>
                          <tr>
                            <td style="text-decoration:underline">Date et heure</td><td>'. $dateHeureRdvCast . '</td>
                          </tr>

                        </table><br/>
                        <p>Cordialement,</p>
                        <p>Raphaël Maguer<br/>
                        plomberie chauffage<br/>
                        Tel : 06 79 49 62 37<br/></p>


                      </body>
                      </html>
                      ';
      $emailClientHeader  = 'MIME-Version: 1.0' . "\r\n";
      $emailClientHeader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $emailClientHeader .= 'From: Raphael Maguer NoReply <rmaguer@backoffice.com>' . "\r\n";  
      mail($emailClientAddress, $emailClientSubject, $emailClientMessage, $emailClientHeader);

      

      //Message succes et renvoi à la page client
      $this->app->users()->setFlash('<div class="alert alert-success" role="success">Le rendez-vous a bien été ajouté !</div>');
 
      $this->app->httpResponse()->redirect('client-'.$request->getData('idClient_Rdv').'.html');
    }
    
    $this->page->addVar('rendezVous', $rendezVous);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un rendez-vous');
  
    }

  
  public function executeUpdateRendezVous(HTTPRequest $request)
  {
    $this->processForm($request);
    $rdv = $this->managers->getManagerOf('RendezVous')->getUnique($request->getData('id'));

    $this->page->addVar('rdv', $rdv);

    $this->page->addVar('title', 'Modification d\'un rendez-vous');
  }

  public function executeInterventionEffectuee(HTTPRequest $request)
  {
    $rendezVous = $request->getData('id');
 
    $this->managers->getManagerOf('RendezVous')->interventionEffectuee($rendezVous);
    $this->app->users()->setFlash('<div class="alert alert-success" role="alert">le rendez-vous est considéré comme effectué !</div>');
    $this->app->httpResponse()->redirect('/calendrier.html');
  }

  public function processForm(HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $rendezVous = new RendezVous([
        'dateHeure' => $request->postData('dateHeure'),
        'typeIntervention' => $request->postData('typeIntervention'),
        'commentaire' => $request->postData('commentaire'),
        'idClient_Rdv' => $request->postData('idClient_Rdv'),
        'interventionEffectuee' => $request->postData('interventionEffectuee'),
        'mail' => $request->postData('mail')
      ]);
      
      if ($request->getExists('id'))
      {
        $rendezVous->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant du rendez-vous est transmis si on veut le modifier
      if ($request->getExists('id'))
      {
        $rendezVous = $this->managers->getManagerOf('RendezVous')->getUnique($request->getData('id'));
      }
      else
      {
        $rendezVous = new RendezVous;
      }
    }
  
    $formBuilder = new RendezVousFormBuilder($rendezVous);
    $formBuilder->build();
  
    $form = $formBuilder->form();
 
    $formHandler = new FormHandler($form, $this->managers->getManagerOf('RendezVous'), $request);
 
    if ($formHandler->process())
    {
      $client = $this->managers->getManagerOf('Client')->getUnique($rendezVous['idClient_Rdv']);
      $dateHeureRendezVous = $rendezVous['dateHeure'];
      $dateHeureRdvCast = date('d/m/Y à H:i', strtotime($dateHeureRendezVous));

      $emailAddress = "sutre.thomas.29@gmail.com"; 
      $emailSubject = 'Rendez-vous avec '. $client['prenom'] . ' ' . $client['nom'] . ' le ' . $dateHeureRdvCast;
      $emailMessage = '
                      <html>
                        <header style="font-size: 1.3em; font-weight : bold;">
                          Modification de rendez-vous
                        </header>
                        <body>
                          <p style="font-size: 1.2em;">Coordonnées client</p>

                          <table>
                            <tr>
                              <td style="text-decoration:underline">Nom</td><td>' . $client['nom'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Prénom</td><td>' . $client['prenom'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Adresse</td><td>'. $client['adresse'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Code postal</td><td>'. $client['cp'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Ville</td><td>'. $client['ville'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Téléphone</td><td>'. $client['tel'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Email</td><td>'. $client['mail'] . '</td>
                            </tr>
                          </table>

                          <p style="font-size: 1.2em;">Nature du rendez-vous</p>

                          <table>

                            <tr>
                              <td style="text-decoration:underline">Type d\'intervention</td><td>'.$rendezVous['typeIntervention'] . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Date et heure</td><td>'. $dateHeureRdvCast . '</td>
                            </tr>
                            <tr>
                              <td style="text-decoration:underline">Commentaire</td><td>'. $rendezVous['commentaire'] . '</td>
                            </tr>
                          </table>

                        </body>
                      </html>
                      ';

      $emailHeader  = 'MIME-Version: 1.0' . "\r\n";
      $emailHeader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $emailHeader .= 'From: Raphael Maguer NoReply <rmaguer@backoffice.com>' . "\r\n";
      
      mail($emailAddress, $emailSubject, $emailMessage, $emailHeader);   

      //envoi mail client

      $emailClientAddress = $client['mail']; 
      $emailClientSubject = 'Rendez-vous Raphaël Maguer plomberie chauffage ' . ' le ' . $dateHeureRdvCast;
      $emailClientMessage = '
                      <html>
                        <body>
                        <h1 style="font-size:1.25em;">Notification d\'intervention plomberie / chauffage</h1><br/>
                        <p>Bonjour, <br/><br/>
                        un rendez-vous a été modifié avec votre plombier chauffagiste et plannifié le <span style="font-weight:bold;">'.$dateHeureRdvCast.'</span>.<br/>
                        Voici les détails du rendez-vous : </p>
                        <table>

                          <tr>
                            <td style="text-decoration:underline">Type d\'intervention</td><td>'.$rendezVous['typeIntervention'] . '</td>
                          </tr>
                          <tr>
                            <td style="text-decoration:underline">Date et heure</td><td>'. $dateHeureRdvCast . '</td>
                          </tr>

                        </table><br/>
                        <p>Cordialement,</p>
                        <p>Raphaël Maguer<br/>
                        plomberie chauffage<br/>
                        Tel : 06 79 49 62 37<br/></p>


                      </body>
                      </html>
                      ';
      $emailClientHeader  = 'MIME-Version: 1.0' . "\r\n";
      $emailClientHeader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $emailClientHeader .= 'From: Raphael Maguer NoReply <rmaguer@backoffice.com>' . "\r\n";  
      mail($emailClientAddress, $emailClientSubject, $emailClientMessage, $emailClientHeader);

      

      $this->app->users()->setFlash($rendezVous->isNew() ? '<div class="alert alert-success" role="alert">Le Client a bien été ajoutée !</div>' : '<div class="alert alert-success" role="alert">Le rendezVous a bien été modifiée !</div>');
 
      $this->app->httpResponse()->redirect('/');
    }
 
    $this->page->addVar('form', $form->createView());
  }

}
