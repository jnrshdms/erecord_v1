<script type="text/javascript">
	sessionStorage.setItem('notif_approved', 0);
	sessionStorage.setItem('notif_disapproved', 0);
	load_notif_admin_page();
	realtime_load_notif_admin_page = setInterval(load_notif_admin_page, 5000);
	update_notif_admin();
</script>