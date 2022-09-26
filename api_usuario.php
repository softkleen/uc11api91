<?php 
// Api - Aplicação para recursos de app mobile
require('config.php');

// variável que recebe o conteúdo da requisição do APP decodificando-a (json)
$postjson = json_decode(file_get_contents('php://input', true),true);



if($postjson['requisicao']=='avatar'){
   
}

if($postjson['requisicao']=='add'){
    $user = new Usuario($postjson['nome'],
                $postjson['usuario'],
                $postjson['senha'],
                $postjson['nivel'],null,
                $postjson['avatar']);
    
    $id = $user->insert();

    if(isset($id)){
        $result = json_encode(array('success'=>true,'id'=>$id));
    }else{
        $result = json_encode(array('success'=>false,'msg'=>'Falha ao inserir o usuário'));
    }
    echo $result;
}// final requisição add 
else if($postjson['requisicao']=='listar'){
    $user = new Usuario();
    if($postjson['nome']==''){
       $res = Usuario::getList();  
    }else{
        $res = $user->search($postjson['nome']); 
    }
    for($i=0;$i < count($res); $i++){
        $dados[][] = array(
            'id'=>$res[$i]['id'],
            'nome'=>$res[$i]['nome'],
            'usuario'=>$res[$i]['usuario'],
            'senha'=>$res[$i]['senha'],
            'senha_original'=>$res[$i]['senha_original'],
            'nivel'=>$res[$i]['nivel'],
            'ativo'=>$res[$i]['ativo'],
            'avatar'=>$res[$i]['avatar']
        );
    }
    if(count($res)>0){
        $result = json_encode(array('success'=>true,'result'=>$dados));
    }
    else{
        $result = json_encode(array('success'=>false,'result'=>'Eita Cláudia....'));
    }
    echo ($result);
}// fim do listar
else if($postjson['requisicao']=='editar'){
    $user = new Usuario();
    $user->setNome($postjson['nome']);
    $user->setId($postjson['id']);
    $user->setSenha($postjson['senha']);
    $user->setNivel($postjson['nivel']);
    $user->setAvatar($postjson['avatar']);
    if ($user->update()){
        $result = json_encode(array('success'=>true, 'msg'=>"Deu tudo certo com alteração!"));
    }else{
        $result = json_encode(array('success'=>false,'msg'=>"Dados incorretos! Falha ao atualizar o usuário! (WRH014587)"));
    }
    echo $result;
} //final da requisição Editar
else if($postjson['requisicao']=='excluir'){
    $user = new Usuario();
    $user->setId($postjson['id']);
    $res = $user->delete();
    if ($res){
        $result = json_encode(array('success'=>true, 'msg'=>"Usuário excluído com sucesso!"));
    }else{
        $result = json_encode(array('success'=>false,'msg'=>"Falha ao excluir o usuário!"));
    }
    echo $result;
}//final do excluir
else if($postjson['requisicao']=='login'){
    $user = new Usuario();
    $user->efetuarLogin($postjson['usuario'],$postjson['senha']);
    $dados = array(
        'id'=>$user->getId(),
        'nome'=>$user->getNome(),
        'usuario'=>$user->getUsuario(),
        'nivel'=>$user->getNivel(),
        'ativo'=>$user->getAtivo(),
        'avatar'=>$user->getAvatar()
    );
    if (count($dados)>0){
        $result = json_encode(array('success'=>true, 'result'=>$dados));
    }else {

        $result = json_encode(array('success'=>false,'msg'=>"Falha ao efetuar o login!"));
    }
    echo $result;
}//final do login
else if($postjson['requisicao']=='ativar'){
    $query = $pdo->query("UPDATE usuarios set ativo = 1 where id = $postjson[id]");
    if ($query){
        $result = json_encode(array('success'=>true, 'msg'=>"Usuário Ativado com sucesso!"));
    }else{
        $result = json_encode(array('success'=>false,'msg'=>"Falha ao ativar o usuário!"));
    }
    echo $result;
}//final do ativar
?>