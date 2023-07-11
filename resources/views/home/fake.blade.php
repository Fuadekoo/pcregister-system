<style>
    /* CSS Styling */
.permission-message {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.error-symbol {
  margin-bottom: 20px;
  font-size: 64px;
  color: red;
}

.error-symbol .icon {
  display: inline-block;
  vertical-align: middle;
  line-height: 1;
}

.permission-message h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.permission-message p {
  font-size: 18px;
  margin-bottom: 20px;
}

.permission-message .btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
  margin-right: 10px;
}

.permission-message .btn:last-child {
  margin-right: 0;
}

.permission-message .btn:hover {
  background-color: #0056b3;
}

</style>
<!-- HTML Markup -->
<div class="permission-message">
  <div class="error-symbol">
    <span class="icon">!</span>
  </div>
  <h2>Permission Not Granted</h2>
  <p>Your account needs to be activated by an administrator.</p>
  <p>Please go to admin  to activate your account.</p>
  <div>
  <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link">LOGOUT</button>
          </form>
  </div>
</div>
