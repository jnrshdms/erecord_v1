<script type="text/javascript">
	sessionStorage.setItem('notif_new_can_request', 0);
	sessionStorage.setItem('notif_approved', 0);
	sessionStorage.setItem('notif_disapproved', 0);
	load_notif_admin_reviewer();
	realtime_load_notif_admin_reviewer = setInterval(load_notif_admin_reviewer, 5000);
</script>