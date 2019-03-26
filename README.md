# QuickPHP

Quick PHP is a PHP/JS framework for quick building up aplications - and even REST services. It allows you to auto-generate CRUD based on comments in your tables. It comes with authentication and a admin panel embedded.

It also have a simple AngularJs template for a quick monolithic web application. Although more modern architectures have emerged since I created this framework, QuickPHP is still valuable for fast creation of simple to medium complexity panels and websites.

# Run composer install first.

Then, configure your stuff at App/Config/AppConf.php.

The magic them happens in the database, you must set up the table "comments" and the fields comments too. There is a dump example in the Dumps folder.

# Database: Table Comment Example

Let's take as example the table DEALS. MYSQL allows you to add comments, which we add JSON strings we use for configuration.

~~~sql
SHOW TABLE STATUS WHERE Name="deals";
ALTER TABLE deals COMMENT '{"display_name":"Vendas", "type":"storage", "display_fk":"id", "link_n":["products"], "filter":["users", "created_at", "status_venda"]}';
~~~

Where: 
* link_n: Is a table that have a relationship N:N. In this example, it will link to a table called "products" thru a table called deals_products. See the example in the Dumps folder.
* display_fk: The field to be exhibited in a relationship.
* filter: Auto-generate a search field in the crud table.

~~~sql
CREATE TABLE `deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '{"display_name":"Num. Identificação", "required":"false", "mask":"false", "DOM":"input", "readonly":"true","list":"true"}',
  `users` int(11) DEFAULT NULL COMMENT '{"display_name":"Usuário", "required":"true", "mask":"false", "DOM":"select", "link_fk":"users", "list":"true"}',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '{"display_name":"Criado em", "required":"false", "mask":"false", "class":"datepicker", "DOM":"input", "readonly":"true", "list":"true"}',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '{"display_name":"Atualizado em", "required":"false", "mask":"false", "class":"datepicker", "DOM":"input", "readonly":"true", "list":"true"}',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '{"display_name":"Deletado em", "required":"false", "mask":"false", "class":"datepicker", "DOM":"input", "readonly":"true"}',
  `active` int(11) DEFAULT NULL COMMENT '{"display_name":"Ativo", "mask":"false", "DOM":"checkbox", "list":"true"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='{"display_name":"Vendas", "type":"storage", "display_fk":"id", "link_n":["products"]}';
~~~
In the above example, you see a table, and every field have its JSON comments. Pay attention to the DOM type field, and the link_fk node, which links to another table in a 1:N relationship. It will look for the ID field in the table "users".

# Panel

Open /login and use:

User: mriso@intelitica.com
Pass: 123

For adding itens in the menu:
/listing/menu

#rest #services #autocrud #generator #php #angularjs
