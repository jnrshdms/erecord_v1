<script type="text/javascript">
	sessionStorage.setItem('notif_approved', 0);
	sessionStorage.setItem('notif_disapproved', 0);
	load_notif_admin();
	realtime_load_notif_admin = setInterval(load_notif_admin, 5000);
</script>