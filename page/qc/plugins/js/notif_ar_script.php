<script type="text/javascript">
	sessionStorage.setItem('notif_approved', 0);
	sessionStorage.setItem('notif_disapproved', 0);
	load_notif_qc();
	realtime_load_notif_qc = setInterval(load_notif_qc, 5000);
</script>