<!-- Modal -->
<div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="return false;">
                <input type="hidden" id="carId" name="carId" value="">
                <input type="hidden" id="rate" name="rate" value="">

                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <img id="modalCarImg" class="car-thumbnail-modal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <div class="form-group">
                                <p for="imageUrlInput">Image URL</p>
                                <input type="text" class="form-control" id="imageUrlInput" placeholder="Please enter an image URL">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <p for="classInput">Class</p>
                                <input type="text" class="form-control" id="classInput" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="brandInput">Brand</label>
                                <input type="text" class="form-control" id="brandInput">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="modelInput">Model</label>
                                <input type="text" class="form-control" id="modelInput" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="detailInput">Detail</label>
                                <textarea class="form-control" id="detailInput">

                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="transmission">Transmission</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="transmission" id="automatic" value="Automatic Transmission" checked>
                                    <label class="custom-control-label" for="automatic">
                                        Automatic
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="transmission" id="manual" value="Manual Transmission">
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
                                <select class="form-control" id="doorSelect">
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
                                <select class="form-control" id="seatSelect">
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
                                <input type="text" class="form-control" id="rateInput">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" id="updateCarBtn" class="btn btn-info" onclick="updateCar();">
                        Update
                    </button>
                    <button type="button" id="deactivateCarBtn" class="btn btn-warning" onclick="activateCar(false);">
                        Deactivate
                    </button>
                    <button type="button" id="activateCarBtn" class="btn btn-warning" onclick="activateCar(true);">
                        Activate
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>