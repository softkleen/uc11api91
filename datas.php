<?php
            $atual = new DateTime();
            $especifica = new DateTime('1990-01-22');
            $texto = new DateTime(' -3 days');
  
            //print_r($atual);
            //print_r($especifica);
           //print_r($texto);


             $datahorasys = new DateTime();
            $data = $datahorasys->format('d-m-Y');
             echo "</br>"; 
             $datahorasys = new DateTime();
             $hora = $datahorasys->format('H:i');
             echo "</br>"; 
             //$data = new DateTime('-6 year');
             //echo $data->format('d-m-Y H:i:s');

echo "</br>"; 
echo "</br>"; 
			
			?>
			
			<?php
            //$dataSistema = new DateTime();
  			$dataevento = new DateTime('2000-11-13');
  			$intervalo = $dataevento->diff($datahorasys);
 			echo $intervalo->format('%m meses, %d dias, %h horas e %i minutos');
echo "</br>"; 
echo "</br>"; 
/*			

  $intervalo1 = new DateInterval('P6Y');
  echo $intervalo1->format('%y anos e %d dias');
// 2 anos e 4 dias

echo "</br>"; 
echo "</br>"; 
	$datadobanco = '2000-04-14';
  $data1 = new DateTime($datadobanco);
  $data2 = new DateTime('-6 year');
 
  if(new DateTime($datadobanco) >= new DateTime('-6 year'))
  {
  	echo " aluno deve ter 6 anos ou mais.";
  }
  else
  {
  	$dataSistema = new DateTime();
  	$intervalo = $data1 ->diff($dataSistema);
 	echo $intervalo->format('%y anos, %m meses e %d dias. Pode efetuar matrícula! ');
  }
 */
## referência: https://www.devmedia.com.br/manipulando-datas-com-php/32966
?>