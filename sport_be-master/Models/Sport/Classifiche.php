<?php
namespace Models\Sport;

use Models\Table as Table;

class Classifiche extends Table {
    
    // Nome della tabella
    const TABLE_NAME = "classifiche";
    
    public $tempo;
    public $iscrizione;
    
    
    public function __construct($id = 0, $params = []){
        
        parent::init($this, $id);
        
        foreach($params as $k => $v){
            if(is_array($v)){
                $this->$k = 
                        array_map(function($i){return is_int($i)?$i:$i->id;}, $v);
                $this->$k = array_unique($this->$k);
                sort($this->$k);
            }else{
                $this->$k = $v;
            }       
        }
    }
    
    /**
     * Metodo richiesto per integrare l'oggetto con una tabella estendendo table.php
     * Quesyo metodo avrà lo scopo di mappare tutti le proprietà dell oggetto studente
     * con i nomi delle colonne sul database
     * @return type
     */
    static function getBindings(){
        return [
            //"nome_colonna"=>"nome_parametro",
            "id"=>"id",
            "tempo"=>"tempo",
			"iscrizioni_id"=>"iscrizione",
        ];
    }
    
 
}