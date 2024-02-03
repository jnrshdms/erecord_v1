<script type="text/javascript">
	sessionStorage.setItem('notif_approved', 0);
	sessionStorage.setItem('notif_disapproved', 0);
	load_notif_qc_page();
	realtime_load_notif_qc_page = setInterval(load_notif_qc_page, 5000);
	update_notif_qc();
</script>