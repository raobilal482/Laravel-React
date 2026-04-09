<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    protected $casts = [
        'address' => 'array',
        'meta' => 'array',
    ];

    /**
     * Accessors
     */
    // protected function propertyManager(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             return $this->units->first()->manager?->fullName ?? '-';
    //         }
    //     );
    // }

    // protected function unitsWithTenancies(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             return $this->units->filter(function ($unit) {
    //                 return $unit->tenancies->count() > 0;
    //             })->count();
    //         }
    //     );
    // }

    // protected function containsUnit(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             return $this->meta['contains_unit'] ?? null;
    //         }
    //     );
    // }

    // protected function currentTenancy(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             return $this->tenancies()->latest()->first();
    //         }
    //     );
    // }

    // // This function is for used in the Unit and Property search scope by name and address.
    // public function scopeSearchByAddrees($query, $search)
    // {
    //     return $query->where(function ($q) use ($search) {
    //         $q->where('address->line_one', 'ilike', "%$search%")
    //             ->orWhere('address->line_two', 'ilike', "%$search%")
    //             ->orWhere('address->city', 'ilike', "%$search%")
    //             ->orWhere('address->county', 'ilike', "%$search%")
    //             ->orWhere('address->postcode', 'ilike', "%$search%")
    //             ->orWhere('address->country', 'ilike', "%$search%")
    //             ->orWhere('address->locality', 'ilike', "%$search%")
    //             ->orWhere('address->district', 'ilike', "%$search%");
    //     });
    // }

    // public function scopeSearchUnitByAddress(Builder $query, ?string $search)
    // {
    //     return $query->orWhereHas('property', function (Builder $query) use ($search) {
    //         $query->where('address->country', 'ilike', "%$search%")
    //             ->orWhere('address->postcode', 'ilike', "%$search%")
    //             ->orWhere('name', 'ilike', "%$search%");
    //     });
    // }

    // protected function state(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             $latestTenancy = $this->latestTenancy;

    //             if (!$latestTenancy) {
    //                 return UnitStatusEnum::AVAILABLE_TO_LET->value;
    //             }

    //             // Check for Prospective/Approved status first (Under Offer)
    //             if (in_array($latestTenancy->status, [
    //                 TenancyStatusEnum::PROSPECTIVE->value,
    //                 TenancyStatusEnum::APPROVED->value
    //             ])) {
    //                 return UnitStatusEnum::UNDER_OFFER_NEW->value;
    //             }

    //             if ($latestTenancy->status === TenancyStatusEnum::CURRENT->value) {
    //                 return UnitStatusEnum::LET->value;
    //             }

    //             // For other statuses, use date-based logic
    //             $latestTenancyData = $this->tenancy->first();
    //             if (empty($latestTenancyData)) {
    //                 return UnitStatusEnum::AVAILABLE_TO_LET->value;
    //             }
    //             if ($latestTenancyData['end_date'] < now()->format('Y-m-d')) {
    //                 return UnitStatusEnum::AVAILABLE_TO_LET->value;
    //             }
    //         }
    //     );
    // }
    // protected function status(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             $latestTenancy = $this->latestTenancy;

    //             if (!$latestTenancy) {
    //                 return UnitStatusEnum::AVAILABLE_TO_LET->value;
    //             }

    //             // Check for Prospective/Approved status first (Under Offer)
    //             if (in_array($latestTenancy->status, [
    //                 TenancyStatusEnum::PROSPECTIVE->value,
    //                 TenancyStatusEnum::APPROVED->value
    //             ])) {
    //                 return UnitStatusEnum::UNDER_OFFER_NEW->value;
    //             }
    //             if ($latestTenancy->status === TenancyStatusEnum::CURRENT->value) {
    //                 return UnitStatusEnum::LET->value;
    //             }

    //             // For other statuses, use date-based logic
    //             $latestTenancyData = $this->tenancy->first();
    //             if (empty($latestTenancyData)) {
    //                 return UnitStatusEnum::AVAILABLE_TO_LET->value;
    //             }
    //             if ($latestTenancyData['end_date'] < now()->format('Y-m-d')) {
    //                 return UnitStatusEnum::AVAILABLE_TO_LET->value;
    //             }
    //         }
    //     );
    // }

    // protected function completeAddress(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             $completeAddress = '';
    //             if (!empty($this->address['line_one'])) {
    //                 $completeAddress .= $this?->address['line_one'] . ', ';
    //             }
    //             if (!empty($this->address['line_two'])) {
    //                 $completeAddress .= $this?->address['line_two'] . ', ';
    //             }
    //             if (!empty($this->address['postcode'])) {
    //                 $completeAddress .= $this?->address['postcode'] . ', ';
    //             }

    //             if (!empty($this->address['city'])) {
    //                 $completeAddress .= $this?->address['city'] . ', ';
    //             }
    //             if (!empty($this->address['county'])) {
    //                 $completeAddress .= $this?->address['county'] . ', ';
    //             }
    //             if (!empty($this->address['country'])) {
    //                 $completeAddress .= $this?->address['country'];
    //             }

    //             return $completeAddress;
    //         }

    //     );
    // }

    // protected function totalUnits(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn() => $this->units->count()
    //     );
    // }

    // protected function displayTitle(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             if ($this->type === 'property') {
    //                 return $this->property?->name ?? 'N/A';
    //             }

    //             return $this->name ?? 'N/A';
    //         }
    //     );
    // }

    // protected function isVacant(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             $latestTenancy = $this->tenancy->first();
    //             if (empty($latestTenancy)) {
    //                 return true;
    //             }

    //             if (
    //                 $latestTenancy['start_date'] <= now()->format('Y-m-d')
    //                 && $latestTenancy['end_date'] >= now()->format('Y-m-d')
    //             ) {
    //                 return false;
    //             }

    //             return true;
    //         }
    //     );
    // }

    // protected function isOccupied(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             return !$this->isVacant;
    //         }
    //     );
    // }

    // protected function listingStatus(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             return $this->isVacant ? 'vacant' : 'occupied';
    //         }
    //     );
    // }

    // /**
    //  * Relations
    //  */
    // public function invoices()
    // {
    //     return $this->hasManyThrough(
    //         Invoices::class,
    //         Tenancy::class,
    //         'listing_id',
    //         'tenancy_id',
    //         'id',
    //         'id'
    //     );
    // }

    // public function inventories(): HasMany
    // {
    //     return $this->hasMany(Inventory::class);
    // }

    // public function amenities()
    // {
    //     return $this->belongsToMany(Amenity::class, 'listing_amenities');
    // }

    // public function units(): HasMany
    // {
    //     return $this->hasMany(Listing::class, 'parent_id');
    // }

    // public function property(): BelongsTo
    // {
    //     return $this->belongsTo(Listing::class, 'parent_id');
    // }

    // public function types(): BelongsTo
    // {
    //     return $this->belongsTo(Type::class, 'type_id', 'id')
    //         ->orderBy('id', 'asc');
    // }

    // // public function unit_type()
    // // {
    // //     return $this->belongsTo(UnitType::class, 'type_id', 'id');
    // // }

    // public function category(): BelongsTo
    // {
    //     return $this->belongsTo(Type::class)->where('type', TypeEnum::PROPERTY_CATEGORY)->orderBy('id', 'asc');
    // }

    // public function council(): BelongsTo
    // {
    //     return $this->belongsTo(User::class)->where('type', UserTypeEnum::COUNCIL)->orderBy('name', 'asc');
    // }

    // public function area(): BelongsTo
    // {
    //     return $this->belongsTo(Area::class);
    // }

    // // // being used in both units and proeprty resources
    // public function certificate_types()
    // {
    //     return $this->belongsToMany(Type::class, Certificate::class)
    //         ->where('types.type', TypeEnum::CERTIFICATE);
    // }

    // public function certificates()
    // {
    //     return $this->hasMany(Certificate::class, 'listing_id', 'id');
    // }

    // /* public function unit_certificates()
    // {
    //     return $this->hasManyThrough(
    //         Certificate::class,
    //         Listing::class,
    //         'parent_ids', // Foreign key on Listing table (units)
    //         'listing_id', // Foreign key on ListingCertificate table
    //         'id', // Local key on Listing table
    //         'id' // Local key on Listing table
    //     )->with('certificateType') // Load certificate types
    //         ->where('listings.type', 'unit'); // Additional condition to fetch certificates associated with units only
    // } */

    // public function property_tenancies()
    // {
    //     return $this->hasManyThrough(
    //         Tenancy::class,
    //         Listing::class,
    //         'parent_id', // Foreign key on Listing table (units)
    //         'listing_id', // Foreign key on ListingCertificate table
    //         'id', // Local key on Listing table
    //         'id' // Local key on Listing table
    //     );
    //     // ->where('listings.type', 'unit'); // Additional condition to fetch certificates associated with units only
    // }

    // public function property_invoices()
    // {
    //     return $this->hasManyThrough(
    //         Invoices::class,
    //         Listing::class,
    //         'parent_id',
    //         'listing_id',
    //         'id',
    //         'id'
    //     );
    // }
    // public function notes(): HasMany
    // {
    //     return $this->hasMany(Notes::class, 'notesable_id', 'id')->where([
    //         'notesable_type' => self::class,
    //     ]);
    // }


    // // latest tenancy
    // public function tenancy(): HasMany
    // {
    //     return $this->hasMany(Tenancy::class)->orderBy('break_clause_date', 'desc');
    // }

    // public function latestTenancy()
    // {
    //     return $this->hasOne(Tenancy::class)->latest();
    // }

    // public function tenancies(): HasMany
    // {
    //     return $this->hasMany(Tenancy::class);
    // }

    // public function letting_agent()
    // {
    //     return $this->belongsTo(User::class)->where('type', UserTypeEnum::AGENTS)->orderBy('name', 'asc');
    // }

    // public function manager()
    // {
    //     return $this->belongsTo(User::class)->where('type', UserTypeEnum::Staff)->orderBy('name', 'asc');
    // }

    // public function owner(): BelongsTo
    // {
    //     return $this->belongsTo(User::class)->where('type', UserTypeEnum::Owner)->orderBy('name', 'asc');
    // }

    // public function createdBy(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'created_by', 'id')->orderBy('name', 'asc');
    // }

    // public function location(): BelongsTo
    // {
    //     return $this->belongsTo(Location::class);
    // }

    // public function key()
    // {
    //     return $this->hasOne(Key::class);
    // }

    // public function task()
    // {
    //     return $this->morphMany(Task::class, 'taskable');
    // }

    // public function payments()
    // {
    //     return $this->hasMany(Payments::class, 'paymentable_id');
    // }

    // public function eventable(): MorphMany
    // {
    //     return $this->morphMany(Event::class, 'eventable');
    // }

    // public function company()
    // {
    //     return $this->belongsTo(Company::class);
    // }

    // /**
    //  * Activity Logs Relationship
    //  */
    // public function activities()
    // {
    //     return $this->morphMany(\App\Models\Activity::class, 'subject');
    // }

    // /**
    //  * Commission Setup Relationship
    //  */
    // public function commissionSetup()
    // {
    //     return $this->hasOne(CommissionSetup::class, 'unit_id', 'id');
    // }

    // public function commissionSetting()
    // {
    //     return $this->hasOne(CommissionSetting::class, 'company_id');
    // }
    // /**
    //  * Scopes
    //  */
    // public function scopeIsUnit($query)
    // {
    //     return $query->where('type', 'unit');
    // }

    // public function scopeIsProperty($query)
    // {
    //     return $query->where('type', 'property');
    // }

    // public function scopeVacant($query)
    // {
    //     return $query->doesntHave('tenancies');
    // }

    // public function documents(): HasMany
    // {
    //     return $this->hasMany(ModelsMedia::class, 'model_id', 'id')->where([
    //         'collection_name' => MediaCollectionEnum::DOCUMENTS->value,
    //         'model_type' => self::class,
    //     ]);
    // }

    // public function images(): HasMany
    // {
    //     return $this->hasMany(Media::class, 'model_id', 'id')->where([
    //         'collection_name' => MediaCollectionEnum::IMAGES->value,
    //         'model_type' => 'App\Models\Listing',
    //     ]);
    // }

    // public function workOrders(): HasMany
    // {
    //     return $this->hasMany(WorkOrder::class);
    // }

    // public function recurringCharges(): MorphMany
    // {
    //        return $this->morphMany(RecurringCharge::class, 'recurring_chargeable');
    // }

    // public function transactions(): HasManyThrough
    // {
    //     return $this->hasManyThrough(
    //         Transaction::class,
    //         Tenancy::class,
    //         'listing_id',
    //         'transactionable_id',
    //         'id',
    //         'id'
    //     )->where('transactionable_type', Tenancy::class);
    // }

    // public function registerMediaConversions(?Media $media = null): void
    // {
    //     $this->addMediaConversion('image-thumb')
    //         ->width(368)
    //         ->height(300)
    //         ->sharpen(10)
    //         ->nonQueued();
    // }

    // /**
    //  * Scopes should be defined below this line
    //  */
    // public function scopeSingleRentable($query)
    // {
    //     return $query->has('units', '=', 1);
    // }

    // public function scopeMultipleRentable($query)
    // {
    //     return $query->has('units', '>', 1);
    // }

    // /**
    //  * Get the activity log options for the model.
    //  */

    // public function messages(): HasMany
    // {
    //     return $this->hasMany(Inbox::class, 'id')
    //                 ->whereJsonContains('user_ids', $this->id);
    // }

    // public function tags()
    // {
    //     return $this->morphMany(Tags::class, 'tagable')
    //         ->where('tagable_type', self::class)
    //         ->whereExists(function ($query) {
    //             $query->select(DB::raw(1))
    //                 ->from('listings')
    //                 ->whereColumn('listings.id', 'tags.tagable_id')
    //                 ->where('listings.type', 'property');
    //         });
    // }

    // /**
    //  * Viewings for this listing (units only).
    //  */
    // public function viewings(): HasMany
    // {
    //     return $this->hasMany(Viewing::class, 'listing_id');
    // }

    // /**
    //  * Tags for units (morph without property-only restriction).
    //  */
    // public function unitTags(): MorphMany
    // {
    //     return $this->morphMany(Tags::class, 'tagable')
    //         ->where('tagable_type', self::class);
    // }

    // /**
    //  * Void Loss Records Relationship
    //  */
    // public function voidLossRecords(): HasMany
    // {
    //     return $this->hasMany(VoidLossRecord::class, 'unit_id');
    // }

    // /**
    //  * Check if unit has active void loss
    //  */
    // public function hasActiveVoidLoss(): bool
    // {
    //     return $this->voidLossRecords()
    //         ->where('is_processed', false)
    //         ->exists();
    // }

    // /**
    //  * Get GR configuration from commission setup
    //  */
    // public function getGRConfiguration(): ?CommissionSetup
    // {
    //     return $this->commissionSetup()
    //         ->where('is_guaranteed_rent', true)
    //         ->first();
    // }

    // /**
    //  * Check if this unit is configured for Guaranteed Rent
    //  */
    // public function isGuaranteedRent(): bool
    // {
    //     return $this->commissionSetup
    //         && $this->commissionSetup->isGuaranteedRent();
    // }

    // /**
    //  * Check if Pay off Charge button should be visible
    //  * Hidden when there are negative void loss balances
    //  */
    // public function canPayoffCharge(): bool
    // {
    //     // Check if there are any unrecovered void losses
    //     $hasNegativeBalance = $this->voidLossRecords()
    //         ->where('is_processed', true)
    //         ->where('total_loss', '>', 0)
    //         ->exists();

    //     return !$hasNegativeBalance;
    // }

}
