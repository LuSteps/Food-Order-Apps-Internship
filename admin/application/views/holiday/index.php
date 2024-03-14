<style>
  .pagination-link a {
    color: grey;
  }
</style>
<!-- MAIN CONTENT-->
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3 class="title-5 m-b-35">Holiday List</h3>
              <?php if($this->session->flashdata('flash')): ?>
                <div class="alert alert-info" id="flashdata" >
                  <?php echo $this->session->flashdata('flash'); ?>
                </div>
              <?php endif; ?>              
              <!-- DATA TABLE -->
              <div class="table-data__tool">
                <div class="table-data__tool-left">
                  <a
                  class="au-btn au-btn-icon au-btn--green au-btn--small"
                  href="<?= base_url(); ?>holiday/add_holiday"
                  >
                    <i class="zmdi zmdi-plus"></i>Create New
                  </a>
                </div>
              </div>
              <div class="table-responsive table-responsive-data2">
                <table
                  id="zero_config"
                  class="display table table-striped table-bordered table-data2"
                  width="100%"
                >
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>date</th>
                      <th>description</th>
                      <th>edit</th>
                      <th>delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach ($holiday as $hdy) : ?>
                      <tr class="tr-shadow">
                        <td><?= ++$page; ?></td>
                        <td><?= $hdy['date']; ?></td>
                        <td><?= $hdy['description']; ?></td>
                        <td>
                            <div class="table-data-feature">
                            <a
                                class="item"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Edit"
                                href="<?= base_url();?>holiday/edit_holiday/<?= $hdy['id']; ?>"
                            >
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            </div>
                        </td>
                        <td>
                          <div class="table-data-feature">
                            <form action="<?= base_url();?>holiday/delete_holiday" method="post" id="deleteForm<?= $hdy['id']; ?>">
                              <input type="hidden" name="id_number" value="<?= $hdy['id']; ?>">  
                              <button
                                type="button"
                                class="btn item"
                                data-toggle="modal"
                                data-target="#deleteModal<?= $hdy['id']; ?>"
                                title="Delete"
                                >
                                <i class="zmdi zmdi-delete"></i>
                              </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      <tr class="spacer"></tr>
                    <?php 
                    endforeach; ?>
                  </tbody>
                </table>
                <div class="pagination-link">
                  <?php echo $this->pagination->create_links(); ?>
                </div>
              </div>
              <!-- END DATA TABLE -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Pop-up -->
<?php foreach ($holiday as $hdy) : ?>
<div
  class="modal fade"
  id="deleteModal<?= $hdy['id']; ?>"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure to delete it?</div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-dismiss="modal"
        >
          No
        </button>
        <button type="submit" class="btn btn-primary" form="deleteForm<?= $hdy['id']; ?>">Yes</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>