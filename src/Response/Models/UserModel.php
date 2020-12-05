<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class UserModel
 *
 * @method bool hasAccountType()
 * @method bool isAccountType()
 * @method int getAccountType()
 * @method $this setAccountType(int $value)
 * @method $this unsetAccountType()
 * @method bool hasAllowedCommenterType()
 * @method bool isAllowedCommenterType()
 * @method string getAllowedCommenterType()
 * @method $this setAllowedCommenterType(string $value)
 * @method $this unsetAllowedCommenterType()
 * @method bool hasAllowContactsSync()
 * @method bool isAllowContactsSync()
 * @method bool getAllowContactsSync()
 * @method $this setAllowContactsSync(bool $value)
 * @method $this unsetAllowContactsSync()
 * @method bool hasBiography()
 * @method bool isBiography()
 * @method string getBiography()
 * @method $this setBiography(string $value)
 * @method $this unsetBiography()
 * @method bool hasBiographyWithEntities()
 * @method bool isBiographyWithEntities()
 * @method \InstagramFollowers\Response\Models\BiographyWithEntitiesModel getBiographyWithEntities()
 * @method $this setBiographyWithEntities(\InstagramFollowers\Response\Models\BiographyWithEntitiesModel $value)
 * @method $this unsetBiographyWithEntities()
 * @method bool hasCanBoostPost()
 * @method bool isCanBoostPost()
 * @method bool getCanBoostPost()
 * @method $this setCanBoostPost(bool $value)
 * @method $this unsetCanBoostPost()
 * @method bool hasCanHideCategory()
 * @method bool isCanHideCategory()
 * @method bool getCanHideCategory()
 * @method $this setCanHideCategory(bool $value)
 * @method $this unsetCanHideCategory()
 * @method bool hasCanHidePublicContacts()
 * @method bool isCanHidePublicContacts()
 * @method bool getCanHidePublicContacts()
 * @method $this setCanHidePublicContacts(bool $value)
 * @method $this unsetCanHidePublicContacts()
 * @method bool hasCanSeeOrganicInsights()
 * @method bool isCanSeeOrganicInsights()
 * @method bool getCanSeeOrganicInsights()
 * @method $this setCanSeeOrganicInsights(bool $value)
 * @method $this unsetCanSeeOrganicInsights()
 * @method bool hasCanSeePrimaryCountryInSettings()
 * @method bool isCanSeePrimaryCountryInSettings()
 * @method bool getCanSeePrimaryCountryInSettings()
 * @method $this setCanSeePrimaryCountryInSettings(bool $value)
 * @method $this unsetCanSeePrimaryCountryInSettings()
 * @method bool hasCharityProfileFundraiserInfo()
 * @method bool isCharityProfileFundraiserInfo()
 * @method \InstagramFollowers\Response\Models\CharityProfileFundraiserInfoModel getCharityProfileFundraiserInfo()
 * @method $this setCharityProfileFundraiserInfo(\InstagramFollowers\Response\Models\CharityProfileFundraiserInfoModel $value)
 * @method $this unsetCharityProfileFundraiserInfo()
 * @method bool hasCountryCode()
 * @method bool isCountryCode()
 * @method int getCountryCode()
 * @method $this setCountryCode(int $value)
 * @method $this unsetCountryCode()
 * @method bool hasExternalUrl()
 * @method bool isExternalUrl()
 * @method string getExternalUrl()
 * @method $this setExternalUrl(string $value)
 * @method $this unsetExternalUrl()
 * @method bool hasFollowerCount()
 * @method bool isFollowerCount()
 * @method int getFollowerCount()
 * @method $this setFollowerCount(int $value)
 * @method $this unsetFollowerCount()
 * @method bool hasFollowingCount()
 * @method bool isFollowingCount()
 * @method int getFollowingCount()
 * @method $this setFollowingCount(int $value)
 * @method $this unsetFollowingCount()
 * @method bool hasFollowingTagCount()
 * @method bool isFollowingTagCount()
 * @method int getFollowingTagCount()
 * @method $this setFollowingTagCount(int $value)
 * @method $this unsetFollowingTagCount()
 * @method bool hasFriendshipStatus()
 * @method bool isFriendshipStatus()
 * @method \InstagramFollowers\Response\Models\IsBestieModel getFriendshipStatus()
 * @method $this setFriendshipStatus(\InstagramFollowers\Response\Models\IsBestieModel $value)
 * @method $this unsetFriendshipStatus()
 * @method bool hasFullName()
 * @method bool isFullName()
 * @method string getFullName()
 * @method $this setFullName(string $value)
 * @method $this unsetFullName()
 * @method bool hasHasActiveCharityBusinessProfileFundraiser()
 * @method bool isHasActiveCharityBusinessProfileFundraiser()
 * @method bool getHasActiveCharityBusinessProfileFundraiser()
 * @method $this setHasActiveCharityBusinessProfileFundraiser(bool $value)
 * @method $this unsetHasActiveCharityBusinessProfileFundraiser()
 * @method bool hasHasAnonymousProfilePicture()
 * @method bool isHasAnonymousProfilePicture()
 * @method bool getHasAnonymousProfilePicture()
 * @method $this setHasAnonymousProfilePicture(bool $value)
 * @method $this unsetHasAnonymousProfilePicture()
 * @method bool hasHasChaining()
 * @method bool isHasChaining()
 * @method bool getHasChaining()
 * @method $this setHasChaining(bool $value)
 * @method $this unsetHasChaining()
 * @method bool hasHasPlacedOrders()
 * @method bool isHasPlacedOrders()
 * @method bool getHasPlacedOrders()
 * @method $this setHasPlacedOrders(bool $value)
 * @method $this unsetHasPlacedOrders()
 * @method bool hasHdProfilePicUrlInfo()
 * @method bool isHdProfilePicUrlInfo()
 * @method \InstagramFollowers\Response\Models\ProfilePictureModel getHdProfilePicUrlInfo()
 * @method $this setHdProfilePicUrlInfo(\InstagramFollowers\Response\Models\ProfilePictureModel $value)
 * @method $this unsetHdProfilePicUrlInfo()
 * @method bool hasHdProfilePicVersions()
 * @method bool isHdProfilePicVersions()
 * @method \InstagramFollowers\Response\Models\ProfilePictureModel[] getHdProfilePicVersions()
 * @method $this setHdProfilePicVersions(\InstagramFollowers\Response\Models\ProfilePictureModel[] $value)
 * @method $this unsetHdProfilePicVersions()
 * @method bool hasInteropMessagingUserFbid()
 * @method bool isInteropMessagingUserFbid()
 * @method int getInteropMessagingUserFbid()
 * @method $this setInteropMessagingUserFbid(int $value)
 * @method $this unsetInteropMessagingUserFbid()
 * @method bool hasIsBestie()
 * @method bool isIsBestie()
 * @method bool getIsBestie()
 * @method $this setIsBestie(bool $value)
 * @method $this unsetIsBestie()
 * @method bool hasIsBusiness()
 * @method bool isIsBusiness()
 * @method bool getIsBusiness()
 * @method $this setIsBusiness(bool $value)
 * @method $this unsetIsBusiness()
 * @method bool hasIsCallToActionEnabled()
 * @method bool isIsCallToActionEnabled()
 * @method bool getIsCallToActionEnabled()
 * @method $this setIsCallToActionEnabled(bool $value)
 * @method $this unsetIsCallToActionEnabled()
 * @method bool hasIsFacebookOnboardedCharity()
 * @method bool isIsFacebookOnboardedCharity()
 * @method bool getIsFacebookOnboardedCharity()
 * @method $this setIsFacebookOnboardedCharity(bool $value)
 * @method $this unsetIsFacebookOnboardedCharity()
 * @method bool hasIsFavorite()
 * @method bool isIsFavorite()
 * @method bool getIsFavorite()
 * @method $this setIsFavorite(bool $value)
 * @method $this unsetIsFavorite()
 * @method bool hasIsFavoriteForIgtv()
 * @method bool isIsFavoriteForIgtv()
 * @method bool getIsFavoriteForIgtv()
 * @method $this setIsFavoriteForIgtv(bool $value)
 * @method $this unsetIsFavoriteForIgtv()
 * @method bool hasIsFavoriteForStories()
 * @method bool isIsFavoriteForStories()
 * @method bool getIsFavoriteForStories()
 * @method $this setIsFavoriteForStories(bool $value)
 * @method $this unsetIsFavoriteForStories()
 * @method bool hasIsPrivate()
 * @method bool isIsPrivate()
 * @method bool getIsPrivate()
 * @method $this setIsPrivate(bool $value)
 * @method $this unsetIsPrivate()
 * @method bool hasIsUnpublished()
 * @method bool isIsUnpublished()
 * @method bool getIsUnpublished()
 * @method $this setIsUnpublished(bool $value)
 * @method $this unsetIsUnpublished()
 * @method bool hasIsUsingUnifiedInboxForDirect()
 * @method bool isIsUsingUnifiedInboxForDirect()
 * @method bool getIsUsingUnifiedInboxForDirect()
 * @method $this setIsUsingUnifiedInboxForDirect(bool $value)
 * @method $this unsetIsUsingUnifiedInboxForDirect()
 * @method bool hasIsVerified()
 * @method bool isIsVerified()
 * @method bool getIsVerified()
 * @method $this setIsVerified(bool $value)
 * @method $this unsetIsVerified()
 * @method bool hasLatestReelMedia()
 * @method bool isLatestReelMedia()
 * @method int getLatestReelMedia()
 * @method $this setLatestReelMedia(int $value)
 * @method $this unsetLatestReelMedia()
 * @method bool hasLiveSubscriptionStatus()
 * @method bool isLiveSubscriptionStatus()
 * @method string getLiveSubscriptionStatus()
 * @method $this setLiveSubscriptionStatus(string $value)
 * @method $this unsetLiveSubscriptionStatus()
 * @method bool hasMediaCount()
 * @method bool isMediaCount()
 * @method int getMediaCount()
 * @method $this setMediaCount(int $value)
 * @method $this unsetMediaCount()
 * @method bool hasMutualFollowersCount()
 * @method bool isMutualFollowersCount()
 * @method int getMutualFollowersCount()
 * @method $this setMutualFollowersCount(int $value)
 * @method $this unsetMutualFollowersCount()
 * @method bool hasNametag()
 * @method bool isNametag()
 * @method \InstagramFollowers\Response\Models\NametagModel getNametag()
 * @method $this setNametag(\InstagramFollowers\Response\Models\NametagModel $value)
 * @method $this unsetNametag()
 * @method bool hasNationalNumber()
 * @method bool isNationalNumber()
 * @method int getNationalNumber()
 * @method $this setNationalNumber(int $value)
 * @method $this unsetNationalNumber()
 * @method bool hasPageId()
 * @method bool isPageId()
 * @method string getPageId()
 * @method $this setPageId(string $value)
 * @method $this unsetPageId()
 * @method bool hasPageName()
 * @method bool isPageName()
 * @method string getPageName()
 * @method $this setPageName(string $value)
 * @method $this unsetPageName()
 * @method bool hasPhoneNumber()
 * @method bool isPhoneNumber()
 * @method string getPhoneNumber()
 * @method $this setPhoneNumber(string $value)
 * @method $this unsetPhoneNumber()
 * @method bool hasPk()
 * @method bool isPk()
 * @method int getPk()
 * @method $this setPk(int $value)
 * @method $this unsetPk()
 * @method bool hasProfessionalConversionSuggestedAccountType()
 * @method bool isProfessionalConversionSuggestedAccountType()
 * @method int getProfessionalConversionSuggestedAccountType()
 * @method $this setProfessionalConversionSuggestedAccountType(int $value)
 * @method $this unsetProfessionalConversionSuggestedAccountType()
 * @method bool hasProfileContext()
 * @method bool isProfileContext()
 * @method string getProfileContext()
 * @method $this setProfileContext(string $value)
 * @method $this unsetProfileContext()
 * @method bool hasProfileContextLinksWithUserIds()
 * @method bool isProfileContextLinksWithUserIds()
 * @method \InstagramFollowers\Response\Models\ProfileContextLinksWithUserIdsModel[] getProfileContextLinksWithUserIds()
 * @method $this setProfileContextLinksWithUserIds(\InstagramFollowers\Response\Models\ProfileContextLinksWithUserIdsModel[] $value)
 * @method $this unsetProfileContextLinksWithUserIds()
 * @method bool hasProfileContextMutualFollowIds()
 * @method bool isProfileContextMutualFollowIds()
 * @method int[] getProfileContextMutualFollowIds()
 * @method $this setProfileContextMutualFollowIds(int[] $value)
 * @method $this unsetProfileContextMutualFollowIds()
 * @method bool hasProfilePicId()
 * @method bool isProfilePicId()
 * @method string getProfilePicId()
 * @method $this setProfilePicId(string $value)
 * @method $this unsetProfilePicId()
 * @method bool hasProfilePicUrl()
 * @method bool isProfilePicUrl()
 * @method string getProfilePicUrl()
 * @method $this setProfilePicUrl(string $value)
 * @method $this unsetProfilePicUrl()
 * @method bool hasReelAutoArchive()
 * @method bool isReelAutoArchive()
 * @method string getReelAutoArchive()
 * @method $this setReelAutoArchive(string $value)
 * @method $this unsetReelAutoArchive()
 * @method bool hasShouldShowCategory()
 * @method bool isShouldShowCategory()
 * @method bool getShouldShowCategory()
 * @method $this setShouldShowCategory(bool $value)
 * @method $this unsetShouldShowCategory()
 * @method bool hasShouldShowPublicContacts()
 * @method bool isShouldShowPublicContacts()
 * @method bool getShouldShowPublicContacts()
 * @method $this setShouldShowPublicContacts(bool $value)
 * @method $this unsetShouldShowPublicContacts()
 * @method bool hasShowInsightsTerms()
 * @method bool isShowInsightsTerms()
 * @method bool getShowInsightsTerms()
 * @method $this setShowInsightsTerms(bool $value)
 * @method $this unsetShowInsightsTerms()
 * @method bool hasTotalIgtvVideos()
 * @method bool isTotalIgtvVideos()
 * @method int getTotalIgtvVideos()
 * @method $this setTotalIgtvVideos(int $value)
 * @method $this unsetTotalIgtvVideos()
 * @method bool hasUsername()
 * @method bool isUsername()
 * @method string getUsername()
 * @method $this setUsername(string $value)
 * @method $this unsetUsername()
 * @method bool hasUsertagsCount()
 * @method bool isUsertagsCount()
 * @method int getUsertagsCount()
 * @method $this setUsertagsCount(int $value)
 * @method $this unsetUsertagsCount()
 *
 * @package InstagramFollowers\Response\Models
 */
class UserModel extends Response {

    const JSON_PROPERTY_MAP = [
        "pk" => "int",
        "username" => "string",
        "full_name" => "string",
        "is_private" => "bool",
        "profile_pic_url" => "string",
        "profile_pic_id" => "string",
        "is_verified" => "bool",
        "has_anonymous_profile_picture" => "bool",

        "media_count" => "int",
        "follower_count" => "int",
        "following_count" => "int",
        "following_tag_count" => "int",
        "biography" => "string",
        "biography_with_entities" => "BiographyWithEntitiesModel",
        "external_url" => "string",
        "usertags_count" => "int",
        "is_favorite" => "bool",
        "is_unpublished" => "bool",
        "is_favorite_for_stories" => "bool",
        "is_favorite_for_igtv" => "bool",
        "live_subscription_status" => "string",
        "has_chaining" => "bool",
        "hd_profile_pic_versions" => "ProfilePictureModel[]",
        "hd_profile_pic_url_info" => "ProfilePictureModel",
        "mutual_followers_count" => "int",
        "profile_context" => "string",
        "profile_context_links_with_user_ids" => "ProfileContextLinksWithUserIdsModel[]",
        "profile_context_mutual_follow_ids" => "int[]",
        "is_facebook_onboarded_charity" => "bool",
        "has_active_charity_business_profile_fundraiser" => "bool",
        "charity_profile_fundraiser_info" => "CharityProfileFundraiserInfoModel",
        "latest_reel_media" => "int",
        "friendship_status" =>"IsBestieModel",
        "is_bestie" => "bool",

        "can_boost_post" => "bool",
        "page_name" => "string",
        "page_id" => "string",
        "is_business" => "bool",
        "account_type" => "int",
        "professional_conversion_suggested_account_type" => "int",
        "is_call_to_action_enabled" => "bool",
        "can_see_organic_insights" => "bool",
        "show_insights_terms" => "bool",
        "total_igtv_videos" => "int",
        "reel_auto_archive" => "string",
        "has_placed_orders" => "bool",
        "allowed_commenter_type" => "string",
        "nametag" => "NametagModel",
        "can_hide_category" => "bool",
        "can_hide_public_contacts" => "bool",
        "should_show_category" => "bool",
        "should_show_public_contacts" => "bool",
        "is_using_unified_inbox_for_direct" => "bool",
        "interop_messaging_user_fbid" => "int",
        "can_see_primary_country_in_settings" => "bool",
        "allow_contacts_sync" => "bool",
        "phone_number" => "string",
        "country_code" => "int",
        "national_number" => "int"
    ];
}