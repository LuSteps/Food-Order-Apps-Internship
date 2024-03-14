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
              <h3 class="title-5 m-b-35">Menu List</h3>
              <!-- Flash message for trigger -->
              <?php if($this->session->flashdata('flash')): ?>
                <div class="alert alert-info" id="flashdata" >
                  <?php echo $this->session->flashdata('flash'); ?>
                </div>
              <?php endif; ?> 
              <!-- DATA TABLE -->
              <div class="table-data__tool">
                <!-- Add Menu Button -->
                <div class="table-data__tool-left">
                  <a
                    class="au-btn au-btn-icon au-btn--green au-btn--small"
                    href="<?= base_url(); ?>product/add_product"
                  >
                    <i class="zmdi zmdi-plus"></i>Create New
                  </a>
                </div>
              </div>
              <!-- Sort and Search Function -->
              <div class="form-inline col-md-6">
                <form action="<?= base_url('product')?>" method="post" class="form-inline">
                  <div class="form-group mb-2">
                    <label for="select-category" class="sr-only">Sort Category:</label>
                    <select name="category" id="select-category" class="form-control">
                      <option value="0" >All Menu</option>
                      <?php $i = 1;
                      foreach ($category as $cat) : ?>
                        <option value="<?php echo $cat['id']; ?>" <?= (isset($_GET['category']) && $_GET['category'] == $i) ? 'selected' : ''; ?>><?= $cat['category']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </form>
                <form action="<?php echo site_url('search'); ?>" method="post" class="form-inline">
                  <div class="form-group mx-sm-2 mb-2">
                    <div class="input-group">
                      <input
                      type="text"
                      id=""
                      name="keyword"
                      placeholder="Search Menu..."
                      class="form-control"
                      autocomplete="off"
                      />
                      <div class="input-group-btn">
                        <button class="btn text-white au-btn--green" type="submit" name="submitSearch">Search</button>
                      </div>
                    </div>		
                  </div>
                </form>
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
                      <th>category</th>
                      <th>name</th>
                      <th>edit</th>
                      <th>delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Data View -->
                    <?php 
                      foreach ($product as $pro) : ?>
                      <tr class="tr-shadow">
                        <td><?= ++$page; ?></td>
                        <td><?= $pro['category']; ?></td>
                        <td><?= $pro['name']; ?></td>
                        <td>
                          <!-- Edit button -->
                          <div class="table-data-feature">
                            <a 
                              class="item" 
                              data-toggle="tooltip" 
                              data-placement="top" 
                              title="Edit" 
                              href="<?= base_url(); ?>product/edit_product/<?= $pro['menu_id']; ?>"> <!-- ?category=<?= $pro['category']; ?>&name=<?= $pro['name']; ?> -->
                              <i class="zmdi zmdi-edit"></i>
                            </a>
                          </div>
                        </td>
                        <td>
                          <!-- Delete button -->
                          <div class="table-data-feature">
                            <form action="<?= base_url('product/delete_menu'); ?>" method="post" class="form-horizontal">
                              <input type="hidden" name="id" value="<?= $pro['menu_id']; ?>">
                              <button type="button" class="btn item" data-toggle="modal" data-target="#exampleModalCenter" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                              </button>
                          </div>
                        </td>
                      </tr>
                      <tr class="spacer"></tr>
                    <?php endforeach; ?>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure to delete it?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          No
        </button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>