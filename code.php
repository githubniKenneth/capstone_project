<!-- Button to open the modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Rows</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Table with Checkbox Selection in the Modal -->
                  <table id="modalTable" class="table">
                    <thead>
                      <tr>
                        <th>Select</th>
                        <th>Data</th>
                        <!-- Add more columns as needed -->
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" class="rowCheckbox" value="1"></td>
                        <td>Data 1</td>
                        <!-- Add more cells as needed -->
                      </tr>
                      <!-- Add more rows as needed -->
                    </tbody>
                  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Button to Move Selected Rows from Modal Table -->
        <button type="button" class="btn btn-primary" onclick="getDataAndDisplay()">Get and Display Data</button>
      </div>
    </div>
  </div>
</div>

<!-- Display Area for Selected Data -->
<form id="displayForm">
  <h2>Selected Data</h2>
  <ul id="selectedDataList">
    <!-- Selected data will be displayed here -->
  </ul>
</form>

<!-- Include jQuery and Bootstrap JS (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Your custom JavaScript -->
<script>
  function getDataAndDisplay() {
    // Find all checkboxes that are checked in the modal table
    var selectedCheckboxes = $('#modalTable .rowCheckbox:checked');

    // Create an array to store selected data
    var selectedData = [];

    // Iterate through selected checkboxes and store the data
    selectedCheckboxes.each(function () {
      var rowData = $(this).closest('tr').find('td:nth-child(2)').text(); // Adjust the index based on your actual data structure
      selectedData.push(rowData);
    });

    // Send the selected data to the server using AJAX
    $.ajax({
      type: 'POST',
      url: '{{ route("process.data") }}', // Use the named route
      data: { selectedData: selectedData },
      success: function(response) {
        // Handle the server response if needed
        // For example, you can update the displayForm with the received data
        updateDisplayForm(response);
      },
      error: function(error) {
        console.error('Error:', error);
      }
    });
  }

  function updateDisplayForm(data) {
    // Clear previous data
    $('#selectedDataList').empty();

    // Append new data to the display form
    for (var i = 0; i < data.length; i++) {
      $('#selectedDataList').append('<li>' + data[i] + '</li>');
    }

    // Close the modal
    $('#myModal').modal('hide');
  }
</script>


@forelse (menus() as $group)
    <li class="nav-item disabled" id="{{$group->group_code}}">
        <a href="#sidemenu-{{$group->id}}" data-bs-toggle="collapse" class="nav-link text-white component-size" aria-expanded="false">
            <i class="{{$group->group_icon}}"></i>
            <span class="ms-2 component-size">{{$group->group_name}}</span>
            <i class="fa fa-caret-down"></i>
        </a>
        <ul class="collapse ms-1 flex-column" id="sidemenu-{{$group->id}}" data-bs-parent="menu">
            @forelse ($group->active_modules as $module)
                <li class="nav-item" id="{{$module->module_code}}">
                    <a href="{{$module->module_code}}" class="nav-link text-white component-size" aria-current="page">{{$module->module_name}}</a>
                </li>
            @empty
                <!-- Mag execute kapag $group->active_modules is empty -->
                <li class="nav-item">
        <a href="{{$group->group_code}}" class="nav-link text-white component-size" aria-current="page">
            <i class="{{$group->group_icon}}"></i>
            <span class="ms-2 component-size">{{$group->group_name}}</span>
        </a>
    </li>
            @endforelse
        </ul>
    </li>
@empty
    <!-- mag execute if menus() is empty  -->
    <li class="nav-item">
        <span class="text-white">No groups available</span>
    </li>
@endforelse