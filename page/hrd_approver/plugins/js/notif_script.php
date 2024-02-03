<script type="text/javascript">
// Notification Global Variables for Realtime
var realtime_load_notif_hrd_approver;
var realtime_load_notif_hrd_approver_page;

const load_notif_hrd_approver = () => {
  $.ajax({
    url: '../../process/notification/notif.php',
    type: 'POST',
    cache: false,
    data: {
      method: 'count_notif_hrd_approver'
    }, 
    success: response => {
      var icon = `<i class="far fa-bell"></i>`;
      var badge = "";
      var notif_badge = "";
      var notif_approval = "";
      var notif_approval_val = sessionStorage.getItem('notif_approval');
      var notif_approval_body = "";
      try {
        let response_array = JSON.parse(response);
        if (response_array.total > 0) {
          if (response_array.total > 99) {
            var badge = `<span class="badge badge-danger navbar-badge">99+</span>`;
          } else {
            var badge = `<span class="badge badge-danger navbar-badge">${response_array.total}</span>`;
          }
          var notif_badge = `${icon}${badge}`;
          if (response_array.notif_approval > 0) {
            if (response_array.notif_approval < 2) {
              var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approval} new request <span class="float-right text-muted text-sm"></span>`;
              var notif_approval_body = `${response_array.notif_approval} new request `;
            } else {
              var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approval} new requests <span class="float-right text-muted text-sm"></span>`;
              var notif_approval_body = `${response_array.notif_approval} new requests `;
            }
          } else {
            var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          }

          if (notif_approval_val != response_array.notif_approval) {
            $(document).Toasts('create', {
              class: 'bg-warning',
              body: notif_new_can_request_body,
              title: 'New requests',
              icon: 'fas fa-exclamation-circle fa-lg',
              autohide: true,
              delay: 4800
            });
          }

          sessionStorage.setItem('notif_approval', response_array.notif_approval);

        } else {
          sessionStorage.setItem('notif_approval', 0);
          var notif_badge = `${icon}`;
          var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
        }
      } catch(e) {
        console.log(response);
        console.log(`Notification Error!!! Call IT Personnel Immediately!!! They will fix it right away. Error: ${response}`);
      }
      $('#notif_badge').html(notif_badge);
      $('#notif_approval').html(notif_approval);

    }
  });
}

const load_notif_hrd_approver_page = () => {
  $.ajax({
    url: '../../process/notification/notif.php',
    type: 'POST',
    cache: false,
    data: {
      method: 'count_notif_hrd_approver'
    }, 
    success: response => {
      var icon = `<i class="far fa-bell"></i>`;
      var badge = "";
      var notif_badge = "";
      var notif_approval = "";
      var notif_approval_val = sessionStorage.getItem('notif_approval');
      var notif_approval_body = "";
      try {
        let response_array = JSON.parse(response);
        if (response_array.total > 0) {
          if (response_array.total > 99) {
            var badge = `<span class="badge badge-danger navbar-badge">99+</span>`;
          } else {
            var badge = `<span class="badge badge-danger navbar-badge">${response_array.total}</span>`;
          }
          var notif_badge = `${icon}${badge}`;
          if (response_array.notif_approval > 0) {
            if (response_array.notif_approval < 2) {
              var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approval} new request <span class="float-right text-muted text-sm"></span>`;
              var notif_approval_body = `${response_array.notif_approval} new request `;
            } else {
              var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approval} new requests <span class="float-right text-muted text-sm"></span>`;
              var notif_approval_body = `${response_array.notif_approval} new requests `;
            }
          } else {
            var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          }


          if (notif_approval_val != response_array.notif_approval) {
            if (notif_approval_val < response_array.notif_approval) {
              $(document).Toasts('create', {
                class: 'bg-warning',
                body: notif_approval_body,
                title: 'New requests',
                icon: 'fas fa-exclamation-circle fa-lg',
                autohide: true,
                delay: 4800
              });
              update_notif_hrd_approver(); // AUTOCLEAR NOTIF
            }
          }

            sessionStorage.setItem('notif_approval', response_array.notif_approval);

        } else {
          sessionStorage.setItem('notif_approval', 0);
          var notif_badge = `${icon}`;
          var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;

        }
      } catch(e) {
        console.log(response);
        console.log(`Notification Error!!! Call IT Personnel Immediately!!! They will fix it right away. Error: ${response}`);
      }
      $('#notif_badge').html(notif_badge);
      $('#notif_approval').html(notif_approval);
    }
  });
}

const update_notif_hrd_approver_badge = () => {
  $.ajax({
    url: '../../process/notification/notif.php',
    type: 'POST',
    cache: false,
    data: {
      method: 'count_notif_hrd_approver'
    },
    success: response => {
      var icon = `<i class="far fa-bell"></i>`;
      var badge = "";
      var notif_badge = "";
      var notif_approval = "";
      var notif_approval_val = sessionStorage.getItem('notif_approval');
      try {
        let response_array = JSON.parse(response);
        if (response_array.total > 0) {
          if (response_array.total > 99) {
            var badge = `<span class="badge badge-danger navbar-badge">99+</span>`;
          } else {
            var badge = `<span class="badge badge-danger navbar-badge">${response_array.total}</span>`;
          }
          var notif_badge = `${icon}${badge}`;
          if (response_array.notif_approval > 0) {
            if (response_array.notif_approval < 2) {
              var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approval} new request <span class="float-right text-muted text-sm"></span>`;
            } else {
              var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approval} new requests <span class="float-right text-muted text-sm"></span>`;
            }
          } else {
            var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          }

          sessionStorage.setItem('notif_approval', response_array.notif_approval);
        } else {
          sessionStorage.setItem('notif_approval', 0);

          var notif_badge = `${icon}`;
          var notif_approval = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;

        }
      } catch(e) {
        console.log(response);
        console.log(`Notification Error!!! Call IT Personnel Immediately!!! They will fix it right away. Error: ${response}`);
      }
      $('#notif_badge').html(notif_badge);
      $('#notif_approval').html(notif_approval);
    }
  });
}

// Notifications
const update_notif_hrd_approver = () => {
  $.ajax({
    url: '../../process/notification/notif.php',
    type: 'POST',
    cache: false,
    data: {
      method: 'update_notif_hrd_approver'
    },
    success: response => {
      if (response != '') {
        console.log(response);
        console.log(`Notification Error!!! Call IT Personnel Immediately!!! They will fix it right away. Error: ${response}`);
      } else {
        update_notif_hrd_approver_badge();
      }
    }
  });
}
</script>