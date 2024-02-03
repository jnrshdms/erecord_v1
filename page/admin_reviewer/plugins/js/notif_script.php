<script type="text/javascript">
// Notification Global Variables for Realtime
var realtime_load_notif_admin_reviewer;
var realtime_load_notif_admin_reviewer_page;

const load_notif_admin_reviewer = () => {
  $.ajax({
    url: '../../process/notification/notif.php',
    type: 'POST',
    cache: false,
    data: {
      method: 'count_notif_admin_reviewer'
    }, 
    success: response => {
      var icon = `<i class="far fa-bell"></i>`;
      var badge = "";
      var notif_badge = "";
      var notif_new_can_request = "";
      var notif_new_can_request_val = sessionStorage.getItem('notif_new_can_request');
      var notif_new_can_request_body = "";
      var notif_approved = "";
      var notif_approved_val = sessionStorage.getItem('notif_approved');
      var notif_approved_body = "";
      var notif_disapproved = "";
      var notif_disapproved_val = sessionStorage.getItem('notif_disapproved');
      var notif_disapproved_body = "";
      try {
        let response_array = JSON.parse(response);
        if (response_array.total > 0) {
          if (response_array.total > 99) {
            var badge = `<span class="badge badge-danger navbar-badge">99+</span>`;
          } else {
            var badge = `<span class="badge badge-danger navbar-badge">${response_array.total}</span>`;
          }
          var notif_badge = `${icon}${badge}`;
          if (response_array.notif_new_can_request > 0) {
            if (response_array.notif_new_can_request < 2) {
              var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_new_can_request} new request <span class="float-right text-muted text-sm"></span>`;
              var notif_new_can_request_body = `${response_array.notif_new_can_request} new request `;
            } else {
              var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_new_can_request} new requests <span class="float-right text-muted text-sm"></span>`;
              var notif_new_can_request_body = `${response_array.notif_new_can_request} new requests `;
            }
          } else {
            var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          }

          if (response_array.notif_approved > 0) {
            if (response_array.notif_approved < 2) {
              var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approved} new approved <span class="float-right text-muted text-sm"></span>`;
              var notif_approved_body = `${response_array.notif_approved} new approved `;
            } else {
              var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approved} new approved <span class="float-right text-muted text-sm"></span>`;
              var notif_approved_body = `${response_array.notif_approved} new approved `;
            }
          } else {
            var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> No new approved <span class="float-right text-muted text-sm"></span>`;
          }

          if (response_array.notif_disapproved > 0) {
            if (response_array.notif_disapproved < 2) {
              var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_disapproved} new disapproved <span class="float-right text-muted text-sm"></span>`;
              var notif_disapproved_body = `${response_array.notif_disapproved} new disapproved `;
            } else {
              var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_disapproved} new disapproved <span class="float-right text-muted text-sm"></span>`;
              var notif_disapproved_body = `${response_array.notif_disapproved} new disapproved `;
            }
          } else {
            var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> No new disapproved <span class="float-right text-muted text-sm"></span>`;
          }

          if (notif_new_can_request_val != response_array.notif_new_can_request) {
            $(document).Toasts('create', {
              class: 'bg-warning',
              body: notif_new_can_request_body,
              title: 'New requests',
              icon: 'fas fa-exclamation-circle fa-lg',
              autohide: true,
              delay: 4800
            });
          }

          if (notif_approved_val != response_array.notif_approved) {
            $(document).Toasts('create', {
              class: 'bg-success',
              body: notif_approved_body,
              title: 'New approved',
              icon: 'fas fa-exclamation-circle fa-lg',
              autohide: true,
              delay: 4800
            });
          }

          if (notif_disapproved_val != response_array.notif_disapproved) {
            $(document).Toasts('create', {
              class: 'bg-danger',
              body: notif_disapproved_body,
              title: 'New disapproved',
              icon: 'fas fa-exclamation-circle fa-lg',
              autohide: true,
              delay: 4800
            });
          }

          sessionStorage.setItem('notif_new_can_request', response_array.notif_new_can_request);
          sessionStorage.setItem('notif_approved', response_array.notif_approved);
          sessionStorage.setItem('notif_disapproved', response_array.notif_disapproved);

        } else {
          sessionStorage.setItem('notif_new_can_request', 0);
          sessionStorage.setItem('notif_approved', 0);
          sessionStorage.setItem('notif_disapproved', 0);
          var notif_badge = `${icon}`;
          var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> No new approved <span class="float-right text-muted text-sm"></span>`;
          var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> No new disapproved <span class="float-right text-muted text-sm"></span>`;
        }
      } catch(e) {
        console.log(response);
        console.log(`Notification Error!!! Call IT Personnel Immediately!!! They will fix it right away. Error: ${response}`);
      }
      $('#notif_badge').html(notif_badge);
      $('#notif_new_can_request').html(notif_new_can_request);
      $('#notif_approved').html(notif_approved);
      $('#notif_disapproved').html(notif_disapproved);
    }
  });
}

const load_notif_admin_reviewer_page = () => {
  $.ajax({
    url: '../../process/notification/notif.php',
    type: 'POST',
    cache: false,
    data: {
      method: 'count_notif_admin_reviewer'
    }, 
    success: response => {
      var icon = `<i class="far fa-bell"></i>`;
      var badge = "";
      var notif_badge = "";
      var notif_new_can_request = "";
      var notif_new_can_request_val = sessionStorage.getItem('notif_new_can_request');
      var notif_new_can_request_body = "";
      var notif_approved = "";
      var notif_approved_val = sessionStorage.getItem('notif_approved');
      var notif_approved_body = "";
      var notif_disapproved = "";
      var notif_disapproved_val = sessionStorage.getItem('notif_disapproved');
      var notif_disapproved_body = "";
      try {
        let response_array = JSON.parse(response);
        if (response_array.total > 0) {
          if (response_array.total > 99) {
            var badge = `<span class="badge badge-danger navbar-badge">99+</span>`;
          } else {
            var badge = `<span class="badge badge-danger navbar-badge">${response_array.total}</span>`;
          }
          var notif_badge = `${icon}${badge}`;
          if (response_array.notif_new_can_request > 0) {
            if (response_array.notif_new_can_request < 2) {
              var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_new_can_request} new request <span class="float-right text-muted text-sm"></span>`;
              var notif_new_can_request_body = `${response_array.notif_new_can_request} new request `;
            } else {
              var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_new_can_request} new requests <span class="float-right text-muted text-sm"></span>`;
              var notif_new_can_request_body = `${response_array.notif_new_can_request} new requests `;
            }
          } else {
            var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          }

          if (response_array.notif_approved > 0) {
            if (response_array.notif_approved < 2) {
              var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approved} new approved <span class="float-right text-muted text-sm"></span>`;
              var notif_approved_body = `${response_array.notif_approved} new approved `;
            } else {
              var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approved} new approved <span class="float-right text-muted text-sm"></span>`;
              var notif_approved_body = `${response_array.notif_approved} new approved `;
            }
          } else {
            var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> No new approved <span class="float-right text-muted text-sm"></span>`;
          }

          if (response_array.notif_disapproved > 0) {
            if (response_array.notif_disapproved < 2) {
              var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_disapproved} new disapproved <span class="float-right text-muted text-sm"></span>`;
              var notif_disapproved_body = `${response_array.notif_disapproved} new disapproved `;
            } else {
              var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_disapproved} new disapproved <span class="float-right text-muted text-sm"></span>`;
              var notif_disapproved_body = `${response_array.notif_disapproved} new disapproved `;
            }
          } else {
            var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> No new disapproved <span class="float-right text-muted text-sm"></span>`;
          }

          if (notif_new_can_request_val != response_array.notif_new_can_request) {
            if (notif_new_can_request_val < response_array.notif_new_can_request) {
              $(document).Toasts('create', {
                class: 'bg-warning',
                body: notif_new_can_request_body,
                title: 'New requests',
                icon: 'fas fa-exclamation-circle fa-lg',
                autohide: true,
                delay: 4800
              });
              update_notif_admin_reviewer(); // AUTOCLEAR NOTIF
            }
          }

          if (notif_approved_val != response_array.notif_approved) {
            if (notif_approved_val < response_array.notif_approved) {
            $(document).Toasts('create', {
              class: 'bg-success',
              body: notif_approved_body,
              title: 'New approved',
              icon: 'fas fa-exclamation-circle fa-lg',
              autohide: true,
              delay: 4800
            });
             update_notif_admin_reviewer(); // AUTOCLEAR NOTIF
          }
        }

          if (notif_disapproved_val != response_array.notif_disapproved) {
            if (notif_disapproved_val < response_array.notif_disapproved) {
            $(document).Toasts('create', {
              class: 'bg-danger',
              body: notif_disapproved_body,
              title: 'New disapproved',
              icon: 'fas fa-exclamation-circle fa-lg',
              autohide: true,
              delay: 4800
            });
             update_notif_admin_reviewer(); // AUTOCLEAR NOTIF
          }
        }
            sessionStorage.setItem('notif_new_can_request', response_array.notif_new_can_request);
            sessionStorage.setItem('notif_approved', response_array.notif_approved);
            sessionStorage.setItem('notif_disapproved', response_array.notif_disapproved);

        } else {
          sessionStorage.setItem('notif_new_can_request', 0);
          sessionStorage.setItem('notif_approved', 0);
          sessionStorage.setItem('notif_disapproved', 0);
          var notif_badge = `${icon}`;
          var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> No new approved <span class="float-right text-muted text-sm"></span>`;
          var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> No new disapproved <span class="float-right text-muted text-sm"></span>`;
        }
      } catch(e) {
        console.log(response);
        console.log(`Notification Error!!! Call IT Personnel Immediately!!! They will fix it right away. Error: ${response}`);
      }
      $('#notif_badge').html(notif_badge);
      $('#notif_new_can_request').html(notif_new_can_request);
      $('#notif_approved').html(notif_approved);
      $('#notif_disapproved').html(notif_disapproved);
    }
  });
}

const update_notif_admin_reviewer_badge = () => {
  $.ajax({
    url: '../../process/notification/notif.php',
    type: 'POST',
    cache: false,
    data: {
      method: 'count_notif_admin_reviewer'
    },
    success: response => {
      var icon = `<i class="far fa-bell"></i>`;
      var badge = "";
      var notif_badge = "";
      var notif_new_can_request = "";
      var notif_new_can_request_val = sessionStorage.getItem('notif_new_can_request');
      var notif_approved = "";
      var notif_approved_val = sessionStorage.getItem('notif_approved');
      var notif_disapproved = "";
      var notif_disapproved_val = sessionStorage.getItem('notif_disapproved');

      try {
        let response_array = JSON.parse(response);
        if (response_array.total > 0) {
          if (response_array.total > 99) {
            var badge = `<span class="badge badge-danger navbar-badge">99+</span>`;
          } else {
            var badge = `<span class="badge badge-danger navbar-badge">${response_array.total}</span>`;
          }
          var notif_badge = `${icon}${badge}`;
          if (response_array.notif_new_can_request > 0) {
            if (response_array.notif_new_can_request < 2) {
              var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_new_can_request} new request <span class="float-right text-muted text-sm"></span>`;
            } else {
              var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_new_can_request} new requests <span class="float-right text-muted text-sm"></span>`;
            }
          } else {
            var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          }

          if (response_array.notif_approved > 0) {
            if (response_array.notif_approved < 2) {
              var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approved} new approved <span class="float-right text-muted text-sm"></span>`;
            } else {
              var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_approved} new approved <span class="float-right text-muted text-sm"></span>`;
            }
          } else {
            var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> No new approved <span class="float-right text-muted text-sm"></span>`;
          }

          if (response_array.notif_disapproved > 0) {
            if (response_array.notif_disapproved < 2) {
              var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_disapproved} new disapproved <span class="float-right text-muted text-sm"></span>`;
            } else {
              var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> ${response_array.notif_disapproved} new disapproved <span class="float-right text-muted text-sm"></span>`;
            }
          } else {
            var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> No new disapproved <span class="float-right text-muted text-sm"></span>`;
          }

          sessionStorage.setItem('notif_new_can_request', response_array.notif_new_can_request);
          sessionStorage.setItem('notif_approved', response_array.notif_approved);
          sessionStorage.setItem('notif_disapproved', response_array.notif_disapproved);
        } else {
          sessionStorage.setItem('notif_new_can_request', 0);
          sessionStorage.setItem('notif_approved', 0);
          sessionStorage.setItem('notif_disapproved', 0);
          var notif_badge = `${icon}`;
          var notif_new_can_request = `<i class="fas fa-exclamation-circle mr-2"></i> No new requests <span class="float-right text-muted text-sm"></span>`;
          var notif_approved = `<i class="fas fa-exclamation-circle mr-2"></i> No new approved <span class="float-right text-muted text-sm"></span>`;
          var notif_disapproved = `<i class="fas fa-exclamation-circle mr-2"></i> No new disapproved <span class="float-right text-muted text-sm"></span>`;
        }
      } catch(e) {
        console.log(response);
        console.log(`Notification Error!!! Call IT Personnel Immediately!!! They will fix it right away. Error: ${response}`);
      }
      $('#notif_badge').html(notif_badge);
      $('#notif_new_can_request').html(notif_new_can_request);
      $('#notif_approved').html(notif_approved);
      $('#notif_disapproved').html(notif_disapproved);
    }
  });
}

// Notifications
const update_notif_admin_reviewer = () => {
  $.ajax({
    url: '../../process/notification/notif.php',
    type: 'POST',
    cache: false,
    data: {
      method: 'update_notif_admin_reviewer'
    },
    success: response => {
      if (response != '') {
        console.log(response);
        console.log(`Notification Error!!! Call IT Personnel Immediately!!! They will fix it right away. Error: ${response}`);
      } else {
        update_notif_admin_reviewer_badge();
      }
    }
  });
}
</script>