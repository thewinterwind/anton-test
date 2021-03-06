<h1>Medication Perscriptions</h1>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="form-group">
                <label for="">Name:</label> <span> <?php echo $medication['name'] ?> </span>
            </div>
            <div class="form-group">
                <label for="">Description:</label> <span> <?php echo $medication['description'] ?> </span>
            </div>

            <?php echo form_open_multipart('approve-perscription/'. $medication['id']); ?>
                <div class="form-group" style="height: 100%">
                    <label class="note">Add Notes:</label>
                    <textarea cols="50" rows="3" name="doctors_comment"></textarea>
                </div>

                <div class="form-group" style="height: 100%">
                    <label >Price AUD:</label>
                   <select name="price" style="width: 125px">
                        <option value="200">200</option>
                        <option value="30">30</option>
                   </select>
                </div>
                <button class="btn btn-success">Submit and Approve</button>
            </form>

        </div>
    </div>
</div>