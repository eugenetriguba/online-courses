# Simple Rules for Simpler Code

Call them what you want rules, guidelines, etc.
They come from The ThoughtWorks Anthology.

## No Abbreviations

Essentially, use meaningful names and don't abbreviate. Be explicit. There is no benefit in doing in saving a few extra keystrokes, especially when any good editor nowadays will have good autocompletion. Writing those few extra keystrokes is not the bottle neck, reading and understanding the code is.

```php
class Trnsltr {} => class Translator
class UserRepo {} => class UserRepository {}
foreach ($people as $x) {} => foreach ($people as $person) {}
```

The book calls to limit your method name to one or two
words. If we have a fetch function in our UserRepository class,
this might be confusing to simply call it fetch. This is a case 
where it makes sense not to follow that method name guideline since 
we would not be describing what our method does well enough then.
```php 
function fetch($billingId) {} 
// could be better rewritten as:
function fetchByBillingId($id) {}
```

// If a method name has to be super long to describe what it is 
// doing, that could be an indication of a code smell.
```php
class Order 
{
    public function prepareAndShipAndNotifyUser() {}
    // What's a solution?
    
    public function process() {}
    // Well this is a solution, breaking the method up.
    // However this that leads to another problem where 
    // the name process doesn't really tell us anything..
    
    public function shipOrder() {}
    // Another issue is that we can be too explicit. 
    // This can simply be ship(). $order->shipOrder() 
    // feels very redundant. 
}
```

## Don't Use Else

```php
public function store()
{
    $input = Request::all();
    $validation = Validator::make($input, ['username' => 'required']);
    
    if (date('l') !== 'Friday')
    {
        if ($validation->passes())
        {
            Post::create($input);
            
            return Redirect::home();
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }
    }
    else
    {
        throw new Exception('We do not work on Fridays!');
    }
}
```

Alternative
```php
public function store()
{
    $input = Request::all();
    $validation = Validator::make($input, ['username' => 'required']);
    
    if (date('l') == 'Friday')
    {
        throw new Exception('We do not work on Fridays!');
    }
    
    if ($validation->fails())
    {
        return Redirect::back()->withInput()->withErrors($validation);
    }
    
    Post::create($input);
            
    return Redirect::home();
}
```

We could do even more here to make this close even cleaner.

If we want to protect our developers from doing any work on Fridays,
we don't want to repeat this check everywhere. This could be in its own
filter that we could execute before the request. If you're using
Laravel, you can simply use Laravel filters.

We can even use dependency injection to simplify the validation steps
we have in the controller since they don't really belong there.

Furthermore if validation failed, you'd want that method to throw an exception
which you could then catch right there or have a dedicated error handler.
```php
public function store()
{
    $input = Request::all();
    
    $this->validator->validate($input);
    Post::create($input);

    return Redirect::home();
}
```

Another example: Signing up for a subscription

This is assuming the monthly subscription and forever
subscription are distinct enough to warrant their own methods.
```php
function signUp($subscription)
{
    if ($subscription == 'monthly')
    {
        $this->createMonthlySubscription();
    }
    elseif ($subscription == 'forever')
    {
        $this->createForeverSubscription();
    }
}
```

You can see how this would get long and messy the more subscriptions you add.
So what can we do about it? What if we had a subscription interface rather than
simply using a string? Well, it'd allow us to leverage polymorphism. signUp()
doesn't really need to be responsible for what kind of subscription we're making;
it just needs to know that we can make a subscription. Let's see how this would look like.

Now, if we've decided that the monthly and forever subscription are distinct enough
for their own methods, we can make them each into their own distinct classes. So
in some instances here, the subscription will be the monthly subscription class
and will create a monthly subscription whereas in others, it'll be the forever
class. Since they both would implement the same subscription interface, we can
do this.
```php
function signUp(Subscription $subscription)
{
    $subscription->create();
}

function factoryMethod($type)
{
    if ($type == 'forever')
    {
        return new ForeverSubscription;
    }
    
    return new MonthlySubscription;
}

$subscription = getSubscriptionType($type);
signup($subscription);
```

Ways to get rid of else statements:
  * Defensive programming and early returns
  * Throw an exception if it makes sense
  * Leverage polymorphism





