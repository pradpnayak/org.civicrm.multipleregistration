{if $multipleRegistration}
<table class="multipleRegistration-block">
  <tr class="crm-event-manage-registration-form-block-{$multipleRegistration}">
    <td scope="row" class="label" width="20%">{$form.$multipleRegistration.label}</td>
    <td>{$form.$multipleRegistration.html}</td>
  </tr>
</table>
{literal}
<script type="text/javascript">
  CRM.$(function($) {
    $('tr.crm-event-manage-registration-form-block-allow_same_participant_emails')
      .after($('table.multipleRegistration-block tr'));
  });
</script>
{/literal}
{/if}
