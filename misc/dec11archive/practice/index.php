<html>
   <head>
      <title>Second mod_rewrite example</title>
   </head>
   <body>
      <p>
         The requested page was:<br />
         <?php echo $_GET['page']; ?>
      </p>
      <p>
         The requested section was:<br />
         <?php echo $_GET['section']; ?>
      </p>
      <p>
         The requested subsection was:<br />
         <?php echo $_GET['subsection']; ?>
      </p>
      <p>
      	HTTP_HOST:<br />
      	<?php echo $_SERVER['HTTP_HOST']; ?>
      </p>
      <p>
      	REQUEST_URI:<br />
      	<?php echo $_SERVER['REQUEST_URI']; ?>
      </p>
   </body>
</html>
