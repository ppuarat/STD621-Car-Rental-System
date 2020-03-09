<!-- Modal -->
<div class="modal fade" id="rentModal" tabindex="-1" role="dialog" aria-labelledby="rentModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rentModalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="return false;">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <p class="lead" id="class"></p>
              <p class="lead" id="detail"></p>
              <p class="lead" id="transmission"></p>
              <p class="lead" id="price"></p>
            </div>
          </div>
          <div class="row">
            <input type="hidden" id="carId" name="carId" value="">
            <input type="hidden" id="rate" name="rate" value="">
            <div class="col">
              <label>Rent From</label><br>
              <div class="input-daterange input-group" id="datepicker">
                <input type="text" onchange="dateChanged();" class="input-sm form-control" id="start" name="start" />
                <span class="input-group-addon ">to</span>
                <input type="text" onchange="dateChanged();" class="input-sm form-control" id="end" name="end" />
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col">
              <p class="lead" id="total"></p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="submitRent();" class="btn btn-primary">Book Now</button>
        </div>
      </form>
    </div>
  </div>
</div>