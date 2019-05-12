{literal}
<script type="text/javascript">
  CRM.$(function($) {

    getParticipantDetails();
    $('#event_id').change(getParticipantDetails);
    $('#contact_id').change(getParticipantDetails);

    function checkIfEventIsMultipleReg($eventId, $contactId) {
      CRM.api3('Participant', 'getcount', {
        "contact_id": $contactId,
        "event_id": $eventId,
        "status_id": {"!=":"Cancelled"}
      }).then(function($result) {
        if ($result.result > 0) {
          CRM.alert(
            ts('This contact has already been assigned to this event.')
          );
        }
      }, function(error) {
        // ignore
      });
    }

    function getParticipantDetails() {
      let $eventId = $('#event_id').val();
      {/literal}
        {if $eventcontactId}
          let $contactId = {$eventcontactId};
        {else}
          let $contactId = $('#contact_id').val();
        {/if}
      {literal}

      if ($eventId && $contactId) {
        CRM.api3('Event', 'getcount', {
          "id": $eventId,
          "custom_{/literal}{$eventCF}{literal}": 1
        }).then(function($result) {
          if ($result.result > 0) {
            checkIfEventIsMultipleReg($eventId, $contactId);
          }
        }, function(error) {
          // ignore
        });
      }
    }
  });
</script>
{/literal}
