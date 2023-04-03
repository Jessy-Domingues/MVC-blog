<?php 
class View{

    private $_file;
    private $_t;

    public function __construct($action){
        $this->_file = 'views/view'.$action.'.php';
    }

    // fonction qui permet de générer et afficher la vue
    
    public function generate($data){
        $content = $this->generateFile($this->_file,  $data);

        $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));

        echo $view;
    }

    // Fonction qui génere un fichier vue et renvoi le résultat produit
    private function generateFile($file, $data){
        if(file_exists($file)){

            extract($data);

            ob_start();

            //inclut le fihcier vue
            require $file;

            return ob_get_clean();
        } else {
            throw new Exception('Fichier '.$file.' introuvable.');
        }
    }

}

?>
