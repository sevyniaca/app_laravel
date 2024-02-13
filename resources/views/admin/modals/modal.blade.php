
<div class="modal fade" id="modalBox" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="" method="POST" id="formFields">
            @csrf
            <input type="hidden" id="formType">
            <div id="form-event">

            </div>
          </form>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" form="formFields" value="Save">
      </div>
    </div>
  </div>
</div>