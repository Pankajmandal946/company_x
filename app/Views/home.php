
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Admin Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <!-- <div class="container-fluid">
    
        <div class="row">
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
      </div> -->
  </section>
</div>
<!-- 
  else if (isset($request->activity) && $request->activity == 'modify_password') {
            @session_start();
            $user_login->username = $_SESSION['dk_username'];
            $user_login->password = $request->current_password;
            if ($user_login->validate_user()>0) {
                $user_login->user_id = $_SESSION['dk_user_id'];
                $user_login->password = $request->new_password;
                if ($user_login->modify_password()) {
                    $response = [
                        'success' => 1,
                        'code' => 200,
                        'msg' => 'Password Modifyed successfully'
                    ];

                    http_response_code(200);
                    echo json_encode($response);
                } else {
                    throw new \Exception('Fail To Modify Password', 400);
                }
            } else {
                throw new \Exception('Invaild Username or Password', 400);
            }
        } else if (isset($request->activity) && $request->activity == 'change_password') {
            $user_login->username = $request->default_username;
            $user_login->password = $request->current_password;
            $user_id = $user_login->validate_user();
            if ($user_id>0) {
                $user_login->user_id = $user_id;
                $user_login->password = $request->new_password;
                if ($user_login->change_password()) {
                    $response = [
                        'success' => 1,
                        'code' => 200,
                        'msg' => 'Defualt Password changed successfully'
                    ];

                    http_response_code(200);
                    echo json_encode($response);
                } else {
                    throw new \Exception('Fail To Modify Password', 400);
                }
            } else {
                throw new \Exception('Invaild Username or Password', 400);
            }
        }
 -->