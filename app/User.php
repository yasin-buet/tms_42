<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,BillableContract
{
    use Authenticatable, Authorizable, CanResetPassword, Billable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];
    private $errors;
    private $rules = [
        'name' => 'required|unique:users|max:255',
        'email' => 'required|unique:users',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function dailyReports()
    {
        return $this->hasMany('App\DailyReport');
    }
    public function course()
    {
        return $this->belongsToMany('App\Course')->where('course_user.is_currently_enrolled', 1);
    }
    public function subjects()
    {
        return $this->belongsToMany('App\Subject')->withPivot('status');
    }
    public function scopeTrainee($query)
    {
        return $query->where('role', 0);
    }
    public function scopeSupervisor($query)
    {
        return $query->where('role', 1);
    }
    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }
    public function tasks()
    {
        return $this->belongsToMany('App\Task', 'task_user');
    }
    public function validate($data)
    {
        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }
        return true;
    }
    public function errors()
    {
        return $this->errors;
    }
}
