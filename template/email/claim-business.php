<p>Hi</p>
<p>
	Please click on below button to claim your buisness
</p>
<p>
<a href="<?php echo BASE_URL ;?>buisness-claim-confirm.php?bid=<?php echo base64_encode($_GET['bid']); ?>&email=<?php echo $result['user_email']?>&hash=<?php echo $hash; ?>">Claim Business</a>
</p>