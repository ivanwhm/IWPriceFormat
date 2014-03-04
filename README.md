Extensão para formatação de números no Yii 1.1.x.
======================================================================================

Esta extensão permite a formatação de números. É baseada no script PriceFormat do JQuery, mais informações em: http://jquerypriceformat.com

##Requisitos

Esta extensão requer a versão 1.1 ou superior do Yii.

Testes foram realizados somente na versão 1.1.x.

##Uso

Descompacte o arquivo e copie os arquivos para o diretório 

~~~
protected/extensions/priceformat/
~~~

Na view correspondente utilize o seguinte código:

~~~
$this->widget('ext.priceformat.IWPriceFormat', array(
	'model' => $model, 
	'attribute' => 'nome_do_atributo', 
	'htmlOptionsPlugin' => array(
		'size' => 20
	), 
	'options' => array(
		'prefix' => '', 
		'centsSeparator' => '', 
		'thousandsSeparator' => '', 
		'centsLimit' => 0, 
		'allowNegative' => FALSE
	)
));
~~~

Caso não use o campo atrelado a um modelo, o uso é correspondente ao código abaixo:

~~~
$this->widget('ext.priceformat.IWPriceFormat', array(
	'name' => 'nome_do_campo', 
	'id' => 'id_do_campo', 
	'htmlOptionsPlugin' => array(
		'size' => 20
	), 
	'options' => array(
		'prefix' => '', 
		'centsSeparator' => '', 
		'thousandsSeparator' => '', 
		'centsLimit' => 0, 
		'allowNegative' => FALSE
	)
));
~~~


> Você poderá configurar diversas opções de acordo com a tabela a seguir.
 

##Opções

* prefix: define o prefixo do valor. Exemplo: R$
* suffix: define o sufixo do valor. Exemplo: €
* centsSeparator: define o carácter correspondente ao separador de centavos. Exemplo: ,
* thousandsSeparator: define o carácter correspondente ao separador de milhares. Exemplo: .
* limit: define o limite de dígitos antes da vírgula. Exemplo: 3
* centsLimit: define o limite de caracteres após a vírgula. Exemplo 2
* clearPrefix: limpa o prefixo (clearPrefix) ou sufixo (clearSuffix) no evento Blur. Exemplo: TRUE
* allowNegative: indica se o valor pode receber valores negativos. Exemplo: TRUE
* insertPlusSign: inclui o sinal de positivo na frente do valor. Exemplo: TRUE


##Créditos

Os créditos pelo script jQuery PriceFormat são de Eduardo Cuducos e Flávio Silveira.
Maiores informações no endereço: http://jquerypriceformat.com

##Versões

04/03/2014 - 1.0 - Versão inicial da extensão


##Contatos

Ivan Wilhelm

E-mail: ivan.whm@me.com

Twitter: @ivanwhm

Skype: ivan.whm

Outros projetos: https://github.com/ivanwhm