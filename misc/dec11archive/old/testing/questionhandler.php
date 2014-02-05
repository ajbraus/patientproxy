<?php
	if ( isset($_POST['pagename'])) {
		$lastpage = $_POST['pagename'];
	};
	if ( isset($_GET['usstate'])) {
		$_SESSION['userstate'] = $_GET['usstate'];
	};
	
	switch ($lastpage) {
		case 'homepage':
			break;
		case 'map':
			//$_SESSION['userfirst'] = $_POST['userfirst'];
			//$_SESSION['userfirst'] = $_POST['userfirst'];
			break;
		case 'patientinfo':
			$_SESSION['userfirst'] = $_POST['userfirst'];
			$_SESSION['usermiddle'] = $_POST['usermiddle'];
			$_SESSION['userlast'] = $_POST['userlast'];
			$_SESSION['userstreet'] = $_POST['userstreet'];
			$_SESSION['usercity'] = $_POST['usercity'];
			$_SESSION['userstate'] = $_POST['userstate'];
			$_SESSION['userzip'] = $_POST['userzip'];
			break;
		case 'healthproxy':
			$_SESSION['hpfirst'] = $_POST['hpfirst'];
			$_SESSION['hpmiddle'] = $_POST['hpmiddle'];
			$_SESSION['hplast'] = $_POST['hplast'];
			$_SESSION['hpstreet'] = $_POST['hpstreet'];
			$_SESSION['hpcity'] = $_POST['hpcity'];
			$_SESSION['hpstate'] = $_POST['hpstate'];
			$_SESSION['hpzip'] = $_POST['hpzip'];
			break;
		case 'alternatehp':
			$_SESSION['althpfirst'] = $_POST['althpfirst'];
			$_SESSION['althpmiddle'] = $_POST['althpmiddle'];
			$_SESSION['althplast'] = $_POST['althplast'];
			$_SESSION['althpstreet'] = $_POST['althpstreet'];
			$_SESSION['althpcity'] = $_POST['althpcity'];
			$_SESSION['althpstate'] = $_POST['althpstate'];
			$_SESSION['althpzip'] = $_POST['althpzip'];
			break;
		case 'proxyexpiration':
			$_SESSION['proxexp'] = $_POST['proxexp'];
			$_SESSION['pexpdatetext'] = $_POST['pexpdatetext'];
			$_SESSION['pexpcircum'] = $_POST['pexpcircum'];
			$_SESSION['pexpbothdate'] = $_POST['pexpbothdate'];
			$_SESSION['pexpbothcirc'] = $_POST['pexpbothcirc'];
			break;
		case 'authhealthrecs':
			$_SESSION['authorized'] = $_POST['authorized'];
			break;
		case 'livingwillapply':
			$_SESSION['lwpostponedeath'] = $_POST['lwpostponedeath'];
			$_SESSION['lwcomaveg'] = $_POST['lwcomaveg'];
			$_SESSION['lwdemnocomm'] = $_POST['lwdemnocomm'];
			$_SESSION['lwtermnocomm'] = $_POST['lwtermnocomm'];
			$_SESSION['lwother'] = $_POST['lwother'];
			$_SESSION['lwothertext'] = $_POST['lwothertext'];
			break;
		case 'lifesustaintrmt':
			$_SESSION['lifesus'] = $_POST['lifesus'];
			$_SESSION['lsnocpr'] = $_POST['lsnocpr'];
			$_SESSION['lsnodial'] = $_POST['lsnodial'];
			$_SESSION['lsnosurg'] = $_POST['lsnosurg'];
			$_SESSION['lsnointu'] = $_POST['lsnointu'];
			$_SESSION['lsnodrugs'] = $_POST['lsnodrugs'];
			$_SESSION['lsnoelecfib'] = $_POST['lsnoelecfib'];
			$_SESSION['lsnoother'] = $_POST['lsnoother'];
			$_SESSION['lsnoothertext'] = $_POST['lsnoothertext'];
			$_SESSION['lstrialintub'] = $_POST['lstrialintub'];
			$_SESSION['lsdocreeval'] = $_POST['lsdocreeval'];
			break;
		case 'artifnutrhydr':
			$_SESSION['artnuthyd'] = $_POST['artnuthyd'];
			$_SESSION['anhnonosemouth'] = $_POST['anhnonosemouth'];
			$_SESSION['anhnosurginsert'] = $_POST['anhnosurginsert'];
			$_SESSION['anhnoiv'] = $_POST['anhnoiv'];
			$_SESSION['anhspecifytext'] = $_POST['anhspecifytext'];
			$_SESSION['anhdocreeval'] = $_POST['anhdocreeval'];
			break;
		case 'painsuffer':
			$_SESSION['painsuf'] = $_POST['painsuf'];
			$_SESSION['psownwordstext'] = $_POST['psownwordstext'];
			break;
		case 'ownwords':
			$_SESSION['genwishestext'] = $_POST['genwishestext'];		
			break;
		case 'lwexpiration':
			$_SESSION['lwexp'] = $_POST['lwexp'];
			$_SESSION['lwexpdate'] = $_POST['lwexpdate'];			
			$_SESSION['lwexpcircum'] = $_POST['lwexpcircum'];			
			$_SESSION['lwexpbothdate'] = $_POST['lwexpbothdate'];			
			$_SESSION['lwexpbothcirc'] = $_POST['lwexpbothcirc'];			
			break;
		case 'organdonation':
			$_SESSION['orgdonnone'] = $_POST['orgdonnone'];
			$_SESSION['orgdonany'] = $_POST['orgdonany'];			
			$_SESSION['orgdongiveonly'] = $_POST['orgdongiveonly'];			
			$_SESSION['orgdongivelist'] = $_POST['orgdongivelist'];			
			$_SESSION['ordontrans'] = $_POST['orgdontrans'];
			$_SESSION['ordonther'] = $_POST['orgdonther'];			
			$_SESSION['ordonres'] = $_POST['orgdonres'];			
			$_SESSION['ordonedu'] = $_POST['orgdonedu'];			
			break;
		default :
			break;
	};
	
?>