<?php

    class Banco{
    public $user     = 'root';
    public $password = '';
    public $host     = 'localhost';
    public $db       = 'qi_condominio';
    public $mysqli   = '';

    public $result ='';
    public $result2 ='';
    public $result3 = '';
    public $resultcondominio = '';
    public $sind_mensagem='';
    public $usuario ='';
    public $senha ='';
    public $soli_mensagem='';

    private function conectar(){
        $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->db);
        $this->mysqli->set_charset("utf8");
        if (!$this->mysqli->connect_errno) {
            //echo "Conectado<br>";
            return $this->mysqli;
        } else {
            echo "Erro de conexão<br>";
        }
    }

    public function cadastroUsuario($sql,$nome_empresa,$cargo,$inicio,$fim,$situacao, $array_curriculo,$array_foto,$array_curso){
        $mysqli = $this->conectar();
        if ($mysqli->query($sql)) {
            $id = $mysqli->insert_id;
            $sql2 = "INSERT INTO exp_profissional (nome_empresa,cargo,inicio,fim,situacao,id_usuario)
                        VALUES('$nome_empresa','$cargo','$inicio','$fim','$situacao','$id')";
            
            $this->experiencia($sql2);
            $this->escolaridade($array_curso,$id);
            $this->curriculo($array_curriculo,$id);
            $this->fotoPerfilSind($array_foto,$id);
            header("Location: ../perfil_solicitante/solicitante_pagina_espera.html"); exit;
           
        } else {
            echo "Erro ao inserir!";
        }
    }

    private function experiencia($sql2)
    {
        $mysqli = $this->conectar();
        if($mysqli->query($sql2)){
            echo "foi experiecia<br>";
        }else{
            die("Não foi experiencia");
        }
    }


    private function escolaridade($array,$id_usuario)
    {
        $nome = $array[0];
        $instituicao = $array[1];
        $pais = $array[2];
        $tipo = $array[3];
        $inicio = $array[4];
        $conclusao = $array[5];
        $situacao = $array[6];

        $sql3 = "INSERT INTO ecolaridade (nome_curso,instituicao,pais,tipo_curso,inicio,conclusao,situacao,id_usuario)
                        VALUES('$nome','$instituicao','$pais','$tipo','$inicio','$conclusao','$situacao','$id_usuario')";
        $mysqli = $this->conectar();
        if($mysqli->query($sql3)){
            echo "foi escolaridade<br>";
        }else{
            die("Opaa");
        }
    }

    private function curriculo($a,$id)
    {
        $ext = strtolower(substr($a[0],-4)); //Pegando extensão do arquivo
        mkdir('C:/xampp/htdocs/QI/src/usuarios_sind/'.$id.'/curriculo/', 0777, true);
        if (move_uploaded_file($a[1],'../src/usuarios_sind/'.$id.'/curriculo/'.$a[0].$ext)) {
            echo('foi curriculo<br>');
            
        }else{
            echo 'erro curriculo: '.$a[0].'<br>'.$a[1].'<br>'.$a[2].'<br>'.$id;
        }
    }

    private function fotoPerfilSind($a,$id)
    {   
        $ext = strtolower(substr($a[0],-4)); //Pegando extensão do arquivo
        mkdir('C:/xampp/htdocs/QI/src/usuarios_sind/'.$id.'/foto/', 0777, true);
        if (move_uploaded_file($a[1],'../src/usuarios_sind/'.$id.'/foto/1.jpg')) {
            echo('foi foto<br>');
            
        }else{
            echo 'erro sind: '.$a[0].'<br>'.$a[1].'<br>'.$a[2].'<br>'.$id;
        }
    }
    //*************Solicitante************************ */
    public function cadastroCondominioSolicitante($sql,$array_foto){
        $mysqli = $this->conectar();
        if ($mysqli->query($sql)) {
            $id = $mysqli->insert_id;
            $this->fotoPerfilSoli($array_foto,$id);
            header("Location: ../perfil_solicitante/solictante_pagina_espera.html"); exit;
        } else {
            echo "Erro ao inserir solictante!";
        }
    }


    private function fotoPerfilSoli($a,$id)
    {   
        $ext = strtolower(substr($a[0],-4)); //Pegando extensão do arquivo
        mkdir('C:/xampp/htdocs/QI/src/usuarios_soli/'.$id.'/foto/', 0777, true);
        if (move_uploaded_file($a[1],'../src/usuarios_soli/'.$id.'/foto/perfil.jpg')) {
            echo('foi foto<br>');
            
        }else{
            echo 'erro foto: 1'.$a[0].'<br>2'.$a[1].'<br>3'.$a[2].'<br>4'.$id;
        }
    }

    //*************Condominio************************ */
    public function cadastroCondominio($sql,$array_foto){
        $mysqli = $this->conectar();
        if ($mysqli->query($sql)) {
            $id = $mysqli->insert_id;
            $this->fotoPerfilCond($array_foto,$id);
             header("Location: ../perfil_solicitante/solicitante_painel_condominio.php"); exit;
        } else {
            echo "Erro ao inserir cond";
        }
    }

    

    private function fotoPerfilCond($a,$id)
    {   
        $ext = strtolower(substr($a[0],-4)); //Pegando extensão do arquivo
        mkdir('C:/xampp/htdocs/QI/src/usuarios_cond/'.$id.'/foto/', 0777, true);
        if (move_uploaded_file($a[1],'../src/usuarios_cond/'.$id.'/foto/perfil.jpg')) {
            echo('foi foto<br>');
            
        }else{
            echo 'erro cond: '.$a[0].'<br>'.$a[1].'<br>'.$a[2].'<br>'.$id;
        }
    }
    
    public function MinhasVagas($id_usuario){
        $mysqli = $this->conectar();
        $result=0;
        $result2=0;
        $sql="SELECT * FROM candidato_vaga WHERE id_usuario = '$id_usuario'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result2=$mysqli->query($sql)) {
            
            $rowSeguindo=mysqli_fetch_assoc($this->result2);

        return $rowSeguindo;
        } else {
            echo "Erro ao Listar minhas vagas";
        }
    }

    public function listarMinhasVagas($id){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlVaga="SELECT * FROM vagas_condominio WHERE id = '$id'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sqlVaga)) {
            //$this->$result2 = $mysqli->query($sqlCond);

            $rowVaga=mysqli_fetch_assoc($this->result);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return $rowVaga;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }


    public function listarDadosSolicitante($id){
        $mysqli = $this->conectar();
        $result2=0;
        
        $sqlCondSolicitante="SELECT * FROM solicitante_cond WHERE id = '$id'";//seleciona solicitante do usuario com base no id recebido
        
        if ($this->result=$mysqli->query($sqlCondSolicitante)) {
            
            $rowSolicitante=mysqli_fetch_assoc($this->result);
            $rowCond = $this->listarCondominios($id);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return array($rowSolicitante,$rowCond/*,$rowCond*/);//envia as duas informações para a pagina
        } else {
            echo "Erro ao Listar!";
        }
    }


    public function listarCondominios($id){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlCond="SELECT * FROM condominio WHERE id_solicitante = '$id'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sqlCond)) {
            //$this->$result2 = $mysqli->query($sqlCond);

            $rowCondominio=mysqli_fetch_assoc($this->result);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return $rowCondominio;//envia as duas informações para a pagina
        } else {
            echo "Erro ao Listar!";
        }
    }

    public function listarMeusCandidatos($id){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlCond="SELECT * FROM vagas_condominio WHERE id_solicitante = '$id' ORDER BY id_solicitante ASC";//seleciona dados do condominio com base no id recebido
        
        if ($teste=$mysqli->query($sqlCond)) {
            //$this->$result2 = $mysqli->query($sqlCond);

           // $rowCondominio=mysqli_fetch_assoc($this->result);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

       // return $rowCondominio;//envia as duas informações para a pagina
        $i=0;               
                            while (!empty($numero_candidatos = mysqli_fetch_assoc($teste))){
                             
                             $a[$i] = $numero_candidatos['id_condominio']; 
                                 
                            $i++;
                            } 
                            $p='';
                        if(!empty($a)){
                            foreach ($a as $key => $value) {
                                if($p != $value){
                                    $this->pegaCandidatosVaga($value);
                                    $p = $value;
                                }
                            }
                        }else{
                            echo "erro";
                        }
                        

        } else {
            echo "Erro ao Listar!";
        }
    }

    public function pegaCandidatosVaga($id){
        $mysqli = $this->conectar();
        
        $sqlCond="SELECT * FROM candidato_vaga WHERE id_condominio = '$id'";//seleciona dados do condominio com base no id recebido
        $s='';
        if ($s=$mysqli->query($sqlCond)) {

            while(!empty($num_vaga = mysqli_fetch_assoc($s))){
                $usu = $this->pegarSindico($num_vaga['id_usuario']);
                $vaga = $this->listarVagasCondominiosParaSindico($num_vaga['id_vaga']);
                $cond = $this->listarCondominiosPerfil($num_vaga['id_condominio']);

               
               echo' <div class="quadro" >
                    <a href="solicitante_candidato_perfil.php?h='.$usu['id'].'">
                        <div class="quadro-img" style="background-image: url(../src/usuarios_sind/'.$usu['id'].'/foto/1.jpg);"></div>
                            <div class="quadro-txt"><div>'.$usu['nome'].'<hr>'.$vaga['posicao'].'</div></div>
                      </a>
                </div>';
                
             }

        } else {
            echo "Erro ao Listar!";
        }
    }

    public function listarVagasCondominiosParaSindico($id2){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlVaga="SELECT * FROM vagas_condominio WHERE id = '$id2'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sqlVaga)) {
            //$this->$result2 = $mysqli->query($sqlCond);

            $rowVaga=mysqli_fetch_assoc($this->result);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return $rowVaga;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }



    public function pegarSindico($id){
        $mysqli = $this->conectar();
        $sql="SELECT * FROM usuarios WHERE id = '$id'";
        if ($s=$mysqli->query($sql)) {
            $usu = mysqli_fetch_assoc($s);
            return $usu;
        }else{
            echo "erro ao pegar";
        }
    }


    public function listarCondominiosPerfil($id){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlCondPerfil="SELECT * FROM condominio WHERE id = '$id'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sqlCondPerfil)) {
            //$this->$result2 = $mysqli->query($sqlCond);

            $rowCondominioPerfil=mysqli_fetch_assoc($this->result);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return $rowCondominioPerfil;//envia as duas informações para a pagina
        } else {
            echo "Erro ao Listar!";
        }
    }
    /**************************cadastro de vagas condominio***************************************************/

    public function cadastroVagaCondominio($sql){
        $mysqli = $this->conectar();
        if ($mysqli->query($sql)) {
            //$id = $mysqli->insert_id;
             header("Location: ../perfil_solicitante/solicitante_painel_vagas.php"); exit;
        } else {
            echo "Erro ao inserir VAGA";
        }
    }
    
    public function listarVagasCondominios($id){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlVaga="SELECT * FROM vagas_condominio WHERE id_solicitante = '$id'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sqlVaga)) {
            //$this->$result2 = $mysqli->query($sqlCond);

            $rowVaga=mysqli_fetch_assoc($this->result);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return $rowVaga;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    

    public function listarVagasCondominiosIdCond($id){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlVaga="SELECT * FROM vagas_condominio WHERE id = '$id'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sqlVaga)) {
            //$this->$result2 = $mysqli->query($sqlCond);

            $rowVaga=mysqli_fetch_assoc($this->result);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return $rowVaga;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function listarVagasCondominiosSeguindo($id){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlVaga="SELECT * FROM vagas_condominio WHERE id_condominio = '$id'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result2=$mysqli->query($sqlVaga)) {
            //$this->$result2 = $mysqli->query($sqlCond);

            $rowVaga=mysqli_fetch_assoc($this->result2);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return $rowVaga;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }


    


    //**************PERFIL SINDICO *********************//

    public function listarDadosSind($id) {
        $mysqli = $this->conectar();
        $result2=0;
        $result3=0;
        $sql="SELECT * FROM usuarios WHERE id = '$id'";//seleciona dados do usuario com base no id recebido
        $sqlExp="SELECT * FROM exp_profissional WHERE id_usuario = '$id'";//seleciona experiencia profissional do usuario com base no id recebido
        
        if ($this->result=$mysqli->query($sql)) {
            $this->$result2 = $mysqli->query($sqlExp);//experiencia

            $row=mysqli_fetch_assoc($this->result);
            $rowExp = mysqli_fetch_assoc($this->$result2);
            $rowEsco = $this->pegaEscolaridade($id);

            return array($row,$rowExp,$rowEsco);//envia as duas informações para a pagina
        } else {
            echo "Erro ao Listar!";
        }
    }
     private function pegaEscolaridade($id){
        $sqlEsco="SELECT * FROM ecolaridade WHERE id_usuario = '$id'";//seleciona escolaridade do usuario com base no id recebido
        $mysqli = $this->conectar();
        if ($this->result=$mysqli->query($sqlEsco)) {
            $row=mysqli_fetch_assoc($this->result);
            return $row; //retorna a escolaridade do usuario
        } else {
            echo "Erro ao pegar escolaridade!";
        }
     }


     public function listarTodasVagas(){
        $mysqli = $this->conectar();
        $result2=0;
        $sqlVaga="SELECT * FROM vagas_condominio";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sqlVaga)) {
            //$this->$result2 = $mysqli->query($sqlCond);

            $rowVaga=mysqli_fetch_assoc($this->result);
            //$rowCond = mysqli_fetch_assoc($this->$result2);

        return $rowVaga;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function listarTodosCondominios(){
        $mysqli = $this->conectar();
        $resultcondominio=0;
        $sqlVaga="SELECT * FROM condominio";//seleciona dados do condominio com base no id recebido
        
        if ($this->resultcondominio=$mysqli->query($sqlVaga)) {
            //$this->$result2 = $mysqli->query($sqlCond);
            $rowCond=mysqli_fetch_assoc($this->resultcondominio);

        return $rowCond;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function verificarSeguindo($id_usuario,$id_cond){
        $mysqli = $this->conectar();
        $result=0;
        $sql="SELECT * FROM seguindo WHERE id_usuario = '$id_usuario' AND id_condominio = '$id_cond'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sql)) {
            
            $rowSeguindo=mysqli_fetch_assoc($this->result);

        return $rowSeguindo;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function pegaSeguindo($id_usuario){
        $mysqli = $this->conectar();
        $result=0;
        $sql="SELECT * FROM seguindo WHERE id_usuario = '$id_usuario' AND seguindo = 1";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sql)) {
            
            $rowSeguindo=mysqli_fetch_assoc($this->result);

        return $rowSeguindo;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function seguir($sql){
        $mysqli = $this->conectar();
        $result=0;
        //$sql="SELECT * FROM seguindo WHERE id_usuario = '$id_usuario' AND id_condominio = '$id_cond'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sql)) {
            //echo "Location: perfilsind.php";
        } else {
            echo "Erro ao Listar! vagas";
        }
    }


    public function Candidatar($sql){
        $mysqli = $this->conectar();
        $result=0;
        //$sql="SELECT * FROM seguindo WHERE id_usuario = '$id_usuario' AND id_condominio = '$id_cond'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sql)) {
            //echo "Location: perfilsind.php";
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function verificarCandidatura($id_usuario,$id_cond,$id_vaga){
        $mysqli = $this->conectar();
        $result=0;
        $sql="SELECT * FROM candidato_vaga WHERE id_usuario = '$id_usuario' AND id_condominio = '$id_cond' AND id_vaga = '$id_vaga'";//seleciona dados do condominio com base no id recebido
        
        if ($this->result=$mysqli->query($sql)) {
            
            $rowSeguindo=mysqli_fetch_assoc($this->result);

        return $rowSeguindo;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function pegarMensagemSindico($id_usuario){
        $mysqli = $this->conectar();
        $sind_mensagem=0;
        $sql="SELECT * FROM mensagens_sindico_adm WHERE id_usuario = '$id_usuario'";//seleciona dados do condominio com base no id recebido
        
        if ($this->sind_mensagem=$mysqli->query($sql)) {
            
            $rowMensagem=mysqli_fetch_assoc($this->sind_mensagem);

        return $rowMensagem;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function pegarMensagemSolicitante($id_usuario){
        $mysqli = $this->conectar();
        $soli_mensagem=0;
        $sql="SELECT * FROM mensagens_solicitante_adm WHERE id_usuario = '$id_usuario'";//seleciona dados do condominio com base no id recebido
        
        if ($this->soli_mensagem=$mysqli->query($sql)) {
            
            $rowMensagem=mysqli_fetch_assoc($this->soli_mensagem);

        return $rowMensagem;
        } else {
            echo "Erro ao Listar! vagas";
        }
    }

    public function InserirMensagemSolicitante($sql){
        $mysqli = $this->conectar();
        $result=0;        
        if ($this->result=$mysqli->query($sql)) {
            
        } else {
            echo "Erro ao enviar mensagem";
        }
    }
    public function InserirMensagemSindico($sql){
        $mysqli = $this->conectar();
        $result=0;        
        if ($this->result=$mysqli->query($sql)) {
            
        } else {
            echo "Erro ao enviar mensagem";
        }
    }
  
///************** LOGIN ****************************
    public function login($sql){

        $mysqli = $this->conectar();
        $resultado = $mysqli->query($sql);
        $num = $resultado->num_rows;
        if ($num != 1) {
            echo "<h1>Login invalido</h1><br>";
        } else {
            $resp = mysqli_fetch_assoc($resultado);
            echo "FOI";
            // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();
    
          // Salva os dados encontrados na sessão
          $_SESSION['UsuarioID'] = $resp['id'];
          $_SESSION['UsuarioNome'] = $resp['nome'];
          //$_SESSION['UsuarioNivel'] = $resp['nivel'];
        
          // Redireciona o visitante
          header("Location: perfilsind.php"); exit;
        }
    }





    public function loginteste($sql,$sql2){

        $mysqli = $this->conectar();
        $resultado = $mysqli->query($sql);
        $resultado2 = $mysqli->query($sql2);
        $num = $resultado->num_rows;
        $num2 = $resultado2->num_rows;
        
        if($num > 0){
            $resp = mysqli_fetch_assoc($resultado);
            echo "FOI";
            // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();
    
          // Salva os dados encontrados na sessão
          $_SESSION['UsuarioID'] = $resp['id'];
          $_SESSION['UsuarioNome'] = $resp['nome'];
          $_SESSION['UsuarioNivel'] = $resp['nivel'];
        
          // Redireciona o visitante
          header("Location: ./perfil_sindico/sindico_perfil.php"); exit;
        }else if($num2 > 0){
            $resp = mysqli_fetch_assoc($resultado2);
            echo "FOI";
            // Se a sessão não existir, inicia uma
        if (!isset($_SESSION)) session_start();
    
          // Salva os dados encontrados na sessão
          $_SESSION['UsuarioID'] = $resp['id'];
          $_SESSION['UsuarioNome'] = $resp['nome'];
          $_SESSION['UsuarioNivel'] = $resp['nivel'];
        
          // Redireciona o visitante
          header("Location: ./perfil_solicitante/solicitante_perfil.php"); exit;
        }else{ 
            echo "<h1>Login invalido</h1><br>";
        }

      
    }

    public function verificaLoginSoli(){
        if (!isset($_SESSION)) session_start();
    
  // Verifica se não há a variável da sessão que identifica o usuário
        if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioNivel'] != 'solicitante') {
        // Destrói a sessão por segurança
            session_destroy();
            // Redireciona o visitante de volta pro login
            header("Location: ../index.html"); exit;
        }
    }

    public function verificaLoginCandidato(){
        if (!isset($_SESSION)) session_start();
    
  // Verifica se não há a variável da sessão que identifica o usuário
        if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioNivel'] != 'sindico') {
        // Destrói a sessão por segurança
            session_destroy();
            // Redireciona o visitante de volta pro login
            header("Location: ../index.html"); exit;
        }
    }

    public function verificaEmail($email){
        $sql = "SELECT email from usuarios where email = '$email'";
        $sql2 = "SELECT email from solicitante_cond where email = '$email'";
        $mysqli = $this->conectar();
        $resultado = $mysqli->query($sql);
        $resultado2 = $mysqli->query($sql2);
        $num = $resultado->num_rows;
        $num2 = $resultado2->num_rows;
        $menssagem="";
        if($num > 0){
            $menssagem="Usuario ja cadastro como sindico";
            return array(false,$menssagem);
        }else if($num2 > 0){
            $menssagem="Usuario ja cadastro como solicitante";
            return array(false,$menssagem);
        }else{ 
            $menssagem='';
            return array(true,$menssagem);
        }
    }
    }
/*
    $teste = new Banco;

    $teste->conectar();*/