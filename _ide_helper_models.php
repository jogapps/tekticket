<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model{
/**
 * App\Model\Category
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $menu_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Event[] $events
 * @property-read int|null $events_count
 * @property-read \App\Model\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Transaction
 *
 * @property string $id
 * @property float $amount
 * @property string $transactionable_type
 * @property string $reference
 * @property string|null $meta
 * @property string $transactionable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $transactionable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction whereTransactionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction whereTransactionableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Transaction whereUpdatedAt($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Event
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property \Illuminate\Support\Carbon $event_date
 * @property string $description
 * @property string $description_raw
 * @property string $street_1
 * @property string|null $street_2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property bool $featured
 * @property string|null $image
 * @property string $category_id
 * @property string $organizer_id
 * @property bool $published
 * @property string $status
 * @property string $ticket_status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Category $category
 * @property-read \App\Model\Organizer $organizer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\EventPrice[] $prices
 * @property-read int|null $prices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Ticket[] $soldTickets
 * @property-read int|null $sold_tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event disabled()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereDescriptionRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereEventDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereOrganizerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereStreet1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereStreet2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereTicketStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Event withoutTrashed()
 */
	class Event extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Wallet
 *
 * @property string $id
 * @property string $user_id
 * @property float $balance
 * @property \Illuminate\Support\Carbon|null $valid_until
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Wallet whereValidUntil($value)
 */
	class Wallet extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Newsletter
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Newsletter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Newsletter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Newsletter query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Newsletter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Newsletter whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Newsletter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Newsletter whereUpdatedAt($value)
 */
	class Newsletter extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Organizer
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $profile_image
 * @property string|null $background_image
 * @property string|null $description
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $instagram
 * @property string|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Event[] $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereBackgroundImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Organizer whereUpdatedAt($value)
 */
	class Organizer extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Model{
/**
 * App\Model\OtherInformation
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $phone_1
 * @property string|null $phone_2
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $twitter
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation wherePhone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\OtherInformation whereUpdatedAt($value)
 */
	class OtherInformation extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Ticket
 *
 * @property string $id
 * @property string $code
 * @property string $user_id
 * @property string $event_price_id
 * @property float $amount
 * @property string $ticket_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\EventPrice $eventPrice
 * @property-read \App\Model\TicketTransaction|null $transaction
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket pending()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket refund()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket used()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket whereEventPriceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket whereTicketStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Ticket whereUserId($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\User
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $profile_image
 * @property string|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\GiftVoucher $giftVoucher
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Ticket[] $tickets
 * @property-read int|null $tickets_count
 * @property-read \App\Model\Wallet $wallet
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\EventPrice
 *
 * @property string $id
 * @property string $event_id
 * @property string $title
 * @property float $amount
 * @property int $ticket_available
 * @property bool $is_unlimited
 * @property bool $is_on_sale
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Ticket[] $soldTickets
 * @property-read int|null $sold_tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereIsOnSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereIsUnlimited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereTicketAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EventPrice whereUpdatedAt($value)
 */
	class EventPrice extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\GiftVoucher
 *
 * @property string $id
 * @property string $user_id
 * @property float $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GiftVoucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GiftVoucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GiftVoucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GiftVoucher whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GiftVoucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GiftVoucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GiftVoucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\GiftVoucher whereUserId($value)
 */
	class GiftVoucher extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\TicketTransaction
 *
 * @property string $id
 * @property string $ticket_id
 * @property string $transaction_status
 * @property string $transaction_for
 * @property string $transaction_via
 * @property string $reference
 * @property float $amount
 * @property string|null $paid_at
 * @property string $transaction_id
 * @property string|null $ip_address
 * @property string|null $attempts
 * @property string $channel
 * @property string $currency
 * @property float $fees
 * @property string $customer_email
 * @property string|null $customer_code
 * @property string $transaction_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Ticket $ticket
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereCustomerCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereTransactionFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereTransactionStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereTransactionVia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\TicketTransaction whereUpdatedAt($value)
 */
	class TicketTransaction extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Menu
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Menu whereUpdatedAt($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Help
 *
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Help whereUpdatedAt($value)
 */
	class Help extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Blog
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string|null $video
 * @property string $description_raw
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereDescriptionRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Blog whereVideo($value)
 */
	class Blog extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\WalletConfig
 *
 * @property string $id
 * @property int $wallet_validity_period The number of days a wallet will be valid (in days)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WalletConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WalletConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WalletConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WalletConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WalletConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WalletConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\WalletConfig whereWalletValidityPeriod($value)
 */
	class WalletConfig extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\FaqCategory
 *
 * @property string $id
 * @property string $name
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Faq[] $faqs
 * @property-read int|null $faqs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FaqCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FaqCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FaqCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FaqCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FaqCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FaqCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FaqCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FaqCategory whereUpdatedAt($value)
 */
	class FaqCategory extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Faq
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Faq whereUpdatedAt($value)
 */
	class Faq extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Page
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Administrator
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Administrator whereUpdatedAt($value)
 */
	class Administrator extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Message
 *
 * @property string $id
 * @property string $subject
 * @property string $message
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

