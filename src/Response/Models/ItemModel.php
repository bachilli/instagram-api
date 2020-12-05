<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class ItemModel
 *
 * @method bool hasCanViewerReshare()
 * @method bool isCanViewerReshare()
 * @method bool getCanViewerReshare()
 * @method $this setCanViewerReshare(bool $value)
 * @method $this unsetCanViewerReshare()
 * @method bool hasCanViewerSave()
 * @method bool isCanViewerSave()
 * @method bool getCanViewerSave()
 * @method $this setCanViewerSave(bool $value)
 * @method $this unsetCanViewerSave()
 * @method bool hasCanViewMorePreviewComments()
 * @method bool isCanViewMorePreviewComments()
 * @method bool getCanViewMorePreviewComments()
 * @method $this setCanViewMorePreviewComments(bool $value)
 * @method $this unsetCanViewMorePreviewComments()
 * @method bool hasCaption()
 * @method bool isCaption()
 * @method \InstagramFollowers\Response\Models\CaptionModel getCaption()
 * @method $this setCaption(\InstagramFollowers\Response\Models\CaptionModel $value)
 * @method $this unsetCaption()
 * @method bool hasCaptionIsEdited()
 * @method bool isCaptionIsEdited()
 * @method bool getCaptionIsEdited()
 * @method $this setCaptionIsEdited(bool $value)
 * @method $this unsetCaptionIsEdited()
 * @method bool hasClientCacheKey()
 * @method bool isClientCacheKey()
 * @method string getClientCacheKey()
 * @method $this setClientCacheKey(string $value)
 * @method $this unsetClientCacheKey()
 * @method bool hasCode()
 * @method bool isCode()
 * @method string getCode()
 * @method $this setCode(string $value)
 * @method $this unsetCode()
 * @method bool hasCommentCount()
 * @method bool isCommentCount()
 * @method int getCommentCount()
 * @method $this setCommentCount(int $value)
 * @method $this unsetCommentCount()
 * @method bool hasCommentLikesEnabled()
 * @method bool isCommentLikesEnabled()
 * @method bool getCommentLikesEnabled()
 * @method $this setCommentLikesEnabled(bool $value)
 * @method $this unsetCommentLikesEnabled()
 * @method bool hasCommentThreadingEnabled()
 * @method bool isCommentThreadingEnabled()
 * @method bool getCommentThreadingEnabled()
 * @method $this setCommentThreadingEnabled(bool $value)
 * @method $this unsetCommentThreadingEnabled()
 * @method bool hasDeviceTimestamp()
 * @method bool isDeviceTimestamp()
 * @method int getDeviceTimestamp()
 * @method $this setDeviceTimestamp(int $value)
 * @method $this unsetDeviceTimestamp()
 * @method bool hasDirectReplyToAuthorEnabled()
 * @method bool isDirectReplyToAuthorEnabled()
 * @method bool getDirectReplyToAuthorEnabled()
 * @method $this setDirectReplyToAuthorEnabled(bool $value)
 * @method $this unsetDirectReplyToAuthorEnabled()
 * @method bool hasFacepileTopLikers()
 * @method bool isFacepileTopLikers()
 * @method \InstagramFollowers\Response\Models\UserModel[] getFacepileTopLikers()
 * @method $this setFacepileTopLikers(\InstagramFollowers\Response\Models\UserModel[] $value)
 * @method $this unsetFacepileTopLikers()
 * @method bool hasFilterType()
 * @method bool isFilterType()
 * @method int getFilterType()
 * @method $this setFilterType(int $value)
 * @method $this unsetFilterType()
 * @method bool hasHasLiked()
 * @method bool isHasLiked()
 * @method bool getHasLiked()
 * @method $this setHasLiked(bool $value)
 * @method $this unsetHasLiked()
 * @method bool hasHasMoreComments()
 * @method bool isHasMoreComments()
 * @method bool getHasMoreComments()
 * @method $this setHasMoreComments(bool $value)
 * @method $this unsetHasMoreComments()
 * @method bool hasId()
 * @method bool isId()
 * @method string getId()
 * @method $this setId(string $value)
 * @method $this unsetId()
 * @method bool hasImageVersions2()
 * @method bool isImageVersions2()
 * @method \InstagramFollowers\Response\Models\Image_Versions2 getImageVersions2()
 * @method $this setImageVersions2(\InstagramFollowers\Response\Models\Image_Versions2 $value)
 * @method $this unsetImageVersions2()
 * @method bool hasInlineComposerDisplayCondition()
 * @method bool isInlineComposerDisplayCondition()
 * @method string getInlineComposerDisplayCondition()
 * @method $this setInlineComposerDisplayCondition(string $value)
 * @method $this unsetInlineComposerDisplayCondition()
 * @method bool hasInlineComposerImpTriggerTime()
 * @method bool isInlineComposerImpTriggerTime()
 * @method int getInlineComposerImpTriggerTime()
 * @method $this setInlineComposerImpTriggerTime(int $value)
 * @method $this unsetInlineComposerImpTriggerTime()
 * @method bool hasLat()
 * @method bool isLat()
 * @method float getLat()
 * @method $this setLat(float $value)
 * @method $this unsetLat()
 * @method bool hasLikeCount()
 * @method bool isLikeCount()
 * @method int getLikeCount()
 * @method $this setLikeCount(int $value)
 * @method $this unsetLikeCount()
 * @method bool hasLng()
 * @method bool isLng()
 * @method float getLng()
 * @method $this setLng(float $value)
 * @method $this unsetLng()
 * @method bool hasLocation()
 * @method bool isLocation()
 * @method \InstagramFollowers\Response\Models\LocationModel getLocation()
 * @method $this setLocation(\InstagramFollowers\Response\Models\LocationModel $value)
 * @method $this unsetLocation()
 * @method bool hasMaxNumVisiblePreviewComments()
 * @method bool isMaxNumVisiblePreviewComments()
 * @method int getMaxNumVisiblePreviewComments()
 * @method $this setMaxNumVisiblePreviewComments(int $value)
 * @method $this unsetMaxNumVisiblePreviewComments()
 * @method bool hasMediaType()
 * @method bool isMediaType()
 * @method int getMediaType()
 * @method $this setMediaType(int $value)
 * @method $this unsetMediaType()
 * @method bool hasOrganicTrackingToken()
 * @method bool isOrganicTrackingToken()
 * @method string getOrganicTrackingToken()
 * @method $this setOrganicTrackingToken(string $value)
 * @method $this unsetOrganicTrackingToken()
 * @method bool hasOriginalHeight()
 * @method bool isOriginalHeight()
 * @method int getOriginalHeight()
 * @method $this setOriginalHeight(int $value)
 * @method $this unsetOriginalHeight()
 * @method bool hasOriginalWidth()
 * @method bool isOriginalWidth()
 * @method int getOriginalWidth()
 * @method $this setOriginalWidth(int $value)
 * @method $this unsetOriginalWidth()
 * @method bool hasPhotoOfYou()
 * @method bool isPhotoOfYou()
 * @method bool getPhotoOfYou()
 * @method $this setPhotoOfYou(bool $value)
 * @method $this unsetPhotoOfYou()
 * @method bool hasPk()
 * @method bool isPk()
 * @method int getPk()
 * @method $this setPk(int $value)
 * @method $this unsetPk()
 * @method bool hasTakenAt()
 * @method bool isTakenAt()
 * @method int getTakenAt()
 * @method $this setTakenAt(int $value)
 * @method $this unsetTakenAt()
 * @method bool hasTopLikers()
 * @method bool isTopLikers()
 * @method string[] getTopLikers()
 * @method $this setTopLikers(string[] $value)
 * @method $this unsetTopLikers()
 * @method bool hasUser()
 * @method bool isUser()
 * @method \InstagramFollowers\Response\Models\UserModel getUser()
 * @method $this setUser(\InstagramFollowers\Response\Models\UserModel $value)
 * @method $this unsetUser()

 *
 * @package InstagramFollowers\Response\Models
 */
class ItemModel extends Response {

    CONST MEDIA_TYPE_IMAGE = 1;

    const JSON_PROPERTY_MAP = [
        "taken_at" => "int",
        "pk" => "int",
        "id" => "string",
        "device_timestamp" => "int",
        "media_type" => "int",
        "code" => "string",
        "client_cache_key" => "string",
        "filter_type" => "int",
        "image_versions2" => "Image_Versions2",
        "original_width" => "int",
        "original_height" => "int",
        "location" => "LocationModel",
        "lat" => "float",
        "lng" => "float",
        "user" => "UserModel",
        "can_viewer_reshare" => "bool",
        "caption_is_edited" => "bool",
        "direct_reply_to_author_enabled" => "bool",
        "comment_likes_enabled" => "bool",
        "comment_threading_enabled" => "bool",
        "has_more_comments" => "bool",
        "max_num_visible_preview_comments" => "int",
        "can_view_more_preview_comments" => "bool",
        "comment_count" => "int",
        "inline_composer_display_condition" => "string",
        "inline_composer_imp_trigger_time" => "int",
        "like_count" => "int",
        "has_liked" => "bool",
        "top_likers" => "string[]",
        "facepile_top_likers" => "UserModel[]",
        "photo_of_you" => "bool",
        "caption" => "CaptionModel",
        "fb_user_tags" => "mixed",
        "can_viewer_save" => "bool",
        "organic_tracking_token" => "string"
    ];
}