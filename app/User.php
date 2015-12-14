<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        return $this->belongsToMany('App\Subject');
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
}
