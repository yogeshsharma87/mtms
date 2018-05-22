<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header active">
      <a class="navbar-brand glyphicon glyphicon-expand red" href="/index/index"></a>
      <a class="navbar-brand" href="/index/index">Mtms</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php 
		$nav = Mtms_Model_Navigation::getNav();
		$nav = array_merge(array(array('url'=>'index/index','name'=>'Dashboard')),$nav);
		foreach ($nav as $navItem) {
			echo '<li ';
			if($this->activeItem == $navItem['url'])
			{
				echo ' class="active" ';
			}
			echo '><a href="/'. $navItem['url'] .'">'. $navItem['name'] .'</a></li>';
		}
		?>
		<li><a href="/index/logout">Logout</a></li>
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
