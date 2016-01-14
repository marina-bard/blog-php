<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>First Blog</title>
        <link rel="stylesheet" href="style.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <div>
                        <h1>Blog</h1>
                        <form method="post" action="index.php?action=add">
                            <label for="comment">Title:</label>
                            <div class="form-group form-group-lg">
                                <input type="text" name="title" class="form-control" id="formGroupInputLarge" placeholder="Title"
                                    aria-describedby="basic-addon1" autofocus required> 
                            </div>
                            <div class="form-group">
                                <label for="comment">Type here:</label>
                                <textarea name="content" class="form-control" rows="5" required> </textarea>                        
                            </div>
                            <div class="form-group">                 
                                <form>
                                    <input type="submit" value="Post" class="btn btn-info btn-lg">
                                </form>  
                            </div>                
                        </form> 
                    </div>             
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="container">
                <?php foreach($posts as $p): ?>
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <div class="post">
                                <h3><?php echo $p->getTitle();?></h3>
                                <em>Published: <?php echo $p->getDate();?></em>
                                <p><?php echo nl2br($p->getContent());?></p>
                            <a href="index.php?action=delete&id=<?php echo $p->getId(); ?>">
                                <input type="button" value="Delete" class="btn btn-info btn-xs">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
                <?php endforeach ?>
            </div>	
            <footer>
            	<p>First Blog<br>Copyright &copy; 2015</p>
            </footer>
        </div>
    </body>
</html>