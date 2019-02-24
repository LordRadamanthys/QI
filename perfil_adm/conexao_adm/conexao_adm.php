<?php 

    class ConexaoAdm{
        public $user     = 'root';
        public $password = '';
        public $host     = 'localhost';
        public $db       = 'qi_condominio';
        public $mysqli   = '';

        public $tipoMensagem="";
        public $pegaUsuario="";
        public $soli_mensagem="";
        public $tipoMensagemSind="";
        public $pegaUsuarioaprovados="";


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


        public function verificaLoginSoli(){
            if (!isset($_SESSION)) session_start();

            if (!isset($_SESSION['UsuarioID']) || $_SESSION['UsuarioNivel'] != 'admin') {
                session_destroy();
                // Redireciona o visitante de volta pro login
                header("Location: ../index.html"); exit;
            }
        }
        
        public function listarConversasSolicitante(){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM mensagens_solicitante_adm order by id Desc";
            
            if ($this->tipoMensagem=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->tipoMensagem);

            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }


        public function listarConversasSindico(){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM mensagens_sindico_adm order by id Desc";
            $tipoMensagemSind="";
            if ($this->tipoMensagemSind=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->tipoMensagemSind);

            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        public function PegaUsuario($id){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM usuarios WHERE id = $id";
            
            if ($this->pegaUsuario=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->pegaUsuario);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        public function PegaTodosUsuario(){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM usuarios";
            
            if ($this->pegaUsuario=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->pegaUsuario);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        public function PegaUsuarioAguardando(){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM usuarios WHERE liberado='nao'";
            
            if ($this->pegaUsuario=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->pegaUsuario);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        public function PegaUsuarioAprovado(){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM usuarios WHERE liberado='sim'";
            
            if ($this->pegaUsuarioaprovados=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->pegaUsuarioaprovados);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        public function PegaEscolaridade($id){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM escolaridade WHERE id = $id";
            $escolaridade="";
            if ($escolaridade=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($escolaridade);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        public function PegarSolicitante($id){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM solicitante_cond WHERE id = $id";
            
            if ($this->pegaUsuario=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->pegaUsuario);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }


        public function PegarSolicitanteOuUsuario($id,$tipo){
            $mysqli = $this->conectar();  
            if($tipo=="solicitante"){
                $sql="SELECT * FROM solicitante_cond WHERE id = $id";
            }else if($tipo=="sindico"){
                $sql="SELECT * FROM usuarios WHERE id = $id";
            }
            if ($this->pegaUsuario=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->pegaUsuario);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        public function NumeroDeMensagens($id,$tipo){
            $mysqli = $this->conectar();  
            $NumeroLinhas=0;
            if($tipo=="sol"){
                $sql="SELECT * FROM mensagens_solicitante_adm WHERE id_usuario = $id AND lida = 0 order by id Desc";
            }else{
                $sql="SELECT * FROM mensagens_sindico_adm WHERE id_usuario = $id AND lida = 0 order by id Desc";
            }
            
            if ($NumeroLinhas=$mysqli->query($sql)) {
                $total = $NumeroLinhas->num_rows;
            return $total;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        private function LidaSoli($id){
            $mysqli = $this->conectar();  
            $sql="UPDATE mensagens_solicitante_adm SET lida = 1 WHERE id_usuario = $id";
            
            if ($mysqli->query($sql)) {
            } else {
                echo "Erro ao Listar!";
            }
        }

        private function LidaSindico($id){
            $mysqli = $this->conectar();  
            $sql="UPDATE mensagens_sindico_adm SET lida = 1 WHERE id_usuario = $id";
            
            if ($mysqli->query($sql)) {
            } else {
                echo "Erro ao Listar!";
            }
        }


        public function AprovarReprovarSindico($sql){
            $mysqli = $this->conectar();  
            if ($mysqli->query($sql)) {
                $this->emailEnviar();
            } else {
                echo "Erro!";
            }
        }


        public function pegarMensagemSolicitante($id_usuario){
            $mysqli = $this->conectar();
            $soli_mensagem=0;
            $sql="SELECT * FROM mensagens_solicitante_adm WHERE id_usuario = '$id_usuario'";//seleciona dados do condominio com base no id recebido
            
            if ($this->soli_mensagem=$mysqli->query($sql)) {
                
                $rowMensagem=mysqli_fetch_assoc($this->soli_mensagem);
                $this->LidaSoli($id_usuario);

            return $rowMensagem;
            } else {
                echo "Erro ao Listar! vagas";
            }
        }


        public function pegarMensagemSindico($id_usuario){
            $mysqli = $this->conectar();
            $soli_mensagem=0;
            $sql="SELECT * FROM mensagens_sindico_adm WHERE id_usuario = '$id_usuario'";//seleciona dados do condominio com base no id recebido
            
            if ($this->soli_mensagem=$mysqli->query($sql)) {
                
                $rowMensagem=mysqli_fetch_assoc($this->soli_mensagem);
                $this->LidaSindico($id_usuario);

            return $rowMensagem;
            } else {
                echo "Erro ao Listar! vagas";
            }
        }

        public function InserirMensagemSolicitanteAdm($sql){
            $mysqli = $this->conectar();
            $result=0;        
            if ($this->result=$mysqli->query($sql)) {
                
            } else {
                echo "Erro ao enviar mensagem";
            }
        }

        private function emailEnviar($nome='mateus',$telefone='565656',$email='',$email_pro=''){
         //1 – Definimos Para quem vai ser enviado o email
          $para = "matosmateu@gmail.com";
          $assunto = "TESTE";
           //2 – Agora definimos a  mensagem que vai ser enviado no e-mail
          $mensagem = "<h1>Segue os dados do novo apoiador</h1><br>";
          $mensagem .= "<strong>Nome:  </strong>".$nome;
          $mensagem .= "<br><strong>Telefone:  </strong>".$telefone;
          $mensagem .= "<br><strong>Email:  </strong>".$email;
          $mensagem .= "<br><strong>Email Profissional:  </strong>".$email_pro;

         
        //3 – agora inserimos as codificações corretas e  tudo mais.
          $headers =  "Content-Type:text/html; charset=UTF-8\n";
          $headers .= "From:  ecossistemacondominial.com.br<ok@dealstraining.com.br>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
          $headers .= "Cc: mlima@ecominio.com.br\n";
          $headers .= "X-Sender:  <ok@dealstraining.com.br>\n"; //email do servidor //que enviou
          $headers .= "X-Mailer: PHP  v".phpversion()."\n";
          $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
          $headers .= "Return-Path:  <ecossistemacondominial@gmail.com\n"; //caso a msg //seja respondida vai para  este email.
          $headers .= "MIME-Version: 1.0\n";
         
        if(!mail($para, $assunto, $mensagem, $headers))
        {
            echo "erro";

        } else{
            echo "foi";
        } //função que faz o envio do email.

    }


    }
?>