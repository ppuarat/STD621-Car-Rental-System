<!-- Modal -->
<div class="modal fade" id="createCarModal" tabindex="-1" role="dialog" aria-labelledby="createCarModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCarModalTitle">Create a new car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="return false;">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <img id="createModalCarImg" class="car-thumbnail-modal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <p for="imageUrlInput">Image URL</p>
                                <input type="text" class="form-control" id="createImageUrlInput" placeholder="Please enter an image URL">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <p for="classInput">Class</p>
                                <input type="text" class="form-control" id="createClassInput">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="brandInput">Brand</label>
                                <input type="text" class="form-control" id="createBrandInput">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="modelInput">Model</label>
                                <input type="text" class="form-control" id="createModelInput">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="detailInput">Detail</label>
                                <textarea class="form-control" id="createDetailInput">

                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="transmission">Transmission</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="createTransmission" id="createAutomatic" value="Automatic Transmission" checked>
                                    <label class="custom-control-label" for="automatic">
                                        Automatic
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="createTransmission" id="createManual" value="Manual Transmission">
                                    <label class="custom-control-label" for="manual">
                                        Manual
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="doorSelect">Doors</label>
                                <select class="form-control" id="createDoorSelect">
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="seatSelect">Seats</label>
                                <select class="form-control" id="createSeatSelect">
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="rateInput">Rental rate/day</label>
                                <input type="text" class="form-control" id="createRateInput">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" id="createCarBtn" class="btn btn-primary" onclick="createCar();">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>