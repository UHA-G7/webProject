<?php
class ErrorController{

  public function error404() {
    //$this->view->setTitle("Page Introuvable");
    //$this->view->render('errors' . DS . 'error404', $this->session->isLogged());
  }

  public function error403($isconnected=false) {
    $this->view->setTitle("Accès interdit");
    if ($isconnected) {
      if (!$this->session->isActive()) {
        $this->session->setNotification("L'utilisateur connecté n'est pas un membre actif, et n'est pas autorisé à accèder à la page demandée. Merci de prendre contact avec l'administrateur du site.", "warning");
      }
      if ($this->session->isLock()) {
        $this->session->setNotification("Le compte de l'utilisateur connecté est verrouillé, et n'est pas autorisé à accèder à la page demandée. Merci de prendre contact avec l'administrateur du site.", "warning");
      }
    }
    $this->view->render('errors' . DS . 'error403', $this->session->isLogged());
  }
}
?>
