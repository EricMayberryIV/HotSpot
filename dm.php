<button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
 data-target="#myModal" style="display: block; width: 100%;">Compose Message
</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;
        </button>
        <h3 class="modal-title">Compose Message</h3>
      </div>
      <div class="modal-body">
        <div class="form-group">
      		<!--<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"></br>-->
      		<input type="text" name="recipient" class="form-control" placeholder="To"></br>
      		<input type="text" name="subject" class="form-control"  placeholder="Subject"></br>
      		<textarea class="form-control" rows="8" placeholder="Message"></textarea>
      	</div>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
        <a href="#" class="btn btn-primary">Send</a>
      </div>
    </div>

  </div>
</div>
