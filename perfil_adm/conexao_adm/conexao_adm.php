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

        public function VerificarUsuarioAprovado($id){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM usuarios WHERE id=$id AND liberado='sim'";
            
            if ($this->pegaUsuarioaprovados=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->pegaUsuarioaprovados);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }


       /* public function PegaEscolaridade($id){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM escolaridade WHERE id = $id";
            $escolaridade="";
            if ($escolaridade=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($escolaridade);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }*/

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

        public function PegarVaga($id){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM vagas_condominio WHERE id = $id";
            
            if ($this->pegaUsuario=$mysqli->query($sql)) {
                $row=mysqli_fetch_assoc($this->pegaUsuario);
            return $row;//envia as duas informações para a pagina
            } else {
                echo "Erro ao Listar!";
            }
        }

        public function PegarTodosSolicitante(){
            $mysqli = $this->conectar();  
            $sql="SELECT * FROM solicitante_cond";
            
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
            } else {
                echo "Erro!";
            }
        }

        public function AprovarReprovarSolicitante($sql){
            $mysqli = $this->conectar();  
            if ($mysqli->query($sql)) {
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

        public function AtualizarSindico($sql,$id,$nome_empresa,$cargo,$inicio,$fim,$situacao,$array_curso){
        $mysqli = $this->conectar();
        if ($mysqli->query($sql)) {
            $sql2 = "UPDATE exp_profissional SET nome_empresa='$nome_empresa',cargo='$cargo',inicio='$inicio',fim='$fim',situacao='$situacao' WHERE id_usuario='$id'";
            
            $this->experiencia($sql2);
            $this->escolaridade($array_curso,$id);
           //$this->curriculo($array_curriculo,$id);
            //$this->fotoPerfilSind($array_foto,$id);
            header("Location: ../adm_sindico_perfil.php?idh=$id"); exit;
           
        } else {
            echo "Erro ao atualizar tudo";
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

     public function AtualizarSolicitante($sql)
    {
        $mysqli = $this->conectar();
        if($mysqli->query($sql)){
            
        }else{
            die("Não foi atualizado");
        }
    }

    public function DeletarSolicitante($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM solicitante_cond WHERE id = $id";
        if($mysqli->query($sql)){
            $this->DeletarVagas($id);
            $this->DeletarCondominio($id);
        }else{
            die("Não deletou solicitante");
        }
    }
    public function DeletarVagas($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM vagas_condominio WHERE id_solicitante = $id";
        if($mysqli->query($sql)){
            
        }else{
            die("Não deletou vaga");
        }
    }

    public function DeletarCondominio($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM condominio WHERE id_solicitante = $id";
        if($mysqli->query($sql)){
            
        }else{
            die("Não deletou Condominio");
        }
    }


    public function DeletarSindico($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM usuarios WHERE id = $id";
        if($mysqli->query($sql)){
            $this->DeletarSeguindo($id);
            $this->DeletaSindicoMensagens($id);
            $this->DeletaSindicoExperiencia($id);
            $this->DeletaSindicoEscolaridade($id);
            $this->DeletaSindicoCandidatoVaga($id);
        }else{
            die("Não deletou vaga");
        }
    }

    public function DeletarSeguindo($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM seguindo WHERE id_usuario = $id";
        if($mysqli->query($sql)){
            
        }else{
            die("Não deletou vaga");
        }
    }

    public function DeletaSindicoMensagens($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM mensagens_sindico_adm WHERE id_usuario = $id";
        if($mysqli->query($sql)){
            
        }else{
            die("Não deletou vaga");
        }
    }

    public function DeletaSindicoExperiencia($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM exp_profissional WHERE id_usuario = $id";
        if($mysqli->query($sql)){
            
        }else{
            die("Não deletou vaga");
        }
    }

    public function DeletaSindicoEscolaridade($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM ecolaridade WHERE id_usuario = $id";
        if($mysqli->query($sql)){
            
        }else{
            die("Não deletou vaga");
        }
    }

    public function DeletaSindicoCandidatoVaga($id){
        $mysqli = $this->conectar();
        $sql = "DELETE FROM candidato_vaga WHERE id_usuario = $id";
        if($mysqli->query($sql)){
            
        }else{
            die("Não deletou vaga");
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

        $sql3 = "UPDATE ecolaridade SET nome_curso='$nome', instituicao='$instituicao', pais='$pais', tipo_curso='$tipo',inicio='$inicio',conclusao='$conclusao',situacao='$situacao' WHERE id_usuario='$id_usuario'";
        $mysqli = $this->conectar();
        if($mysqli->query($sql3)){
            echo "foi escolaridade<br>";
        }else{
            die("Opaa");
        }
    }

        public function emailEnviar($nome,$email_para,$mensagem){
         //1 – Definimos Para quem vai ser enviado o email
          $para = $email_para;
          $assunto = "Administrativo";
           //2 – Agora definimos a  mensagem que vai ser enviado no e-mail
          /*$mensagem = "<h1>Segue os dados do novo apoiador</h1><br>";
          $mensagem .= "<strong>Nome:  </strong>".$nome;
          $mensagem .= "<br><strong>Telefone:  </strong>".$telefone;
          $mensagem .= "<br><strong>Email:  </strong>".$email;
          $mensagem .= "<br><strong>Email Profissional:  </strong>".$email_pro;*/

         
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