<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final
 */
class FrontContainer extends \PrestaShop\PrestaShop\Adapter\Container\LegacyContainer
{
    private $parameters = [];
    private $getService;

    public function __construct()
    {
        $this->getService = \Closure::fromCallable([$this, 'getService']);
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = [];
        $this->syntheticIds = [
            'employee' => true,
            'shop' => true,
        ];
        $this->methodMap = [
            'PrestaShopCorp\\Billing\\Presenter\\BillingPresenter' => 'getBillingPresenterService',
            'PrestaShopCorp\\Billing\\Services\\BillingService' => 'getBillingServiceService',
            'PrestaShop\\ModuleLibCacheDirectoryProvider\\Cache\\CacheDirectoryProvider' => 'getCacheDirectoryProviderService',
            'PrestaShop\\Module\\PrestashopCheckout\\Adapter\\LanguageAdapter' => 'getLanguageAdapterService',
            'PrestaShop\\Module\\PrestashopCheckout\\Builder\\Configuration\\CheckoutClientConfigurationBuilder' => 'getCheckoutClientConfigurationBuilderService',
            'PrestaShop\\Module\\PrestashopCheckout\\Builder\\Configuration\\MaaslandHttpClientConfigurationBuilder' => 'getMaaslandHttpClientConfigurationBuilderService',
            'PrestaShop\\Module\\PrestashopCheckout\\Builder\\ModuleLink\\ModuleLinkBuilder' => 'getModuleLinkBuilderService',
            'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CheckoutChecker' => 'getCheckoutCheckerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\CancelCheckoutCommandHandler' => 'getCancelCheckoutCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\SaveCheckoutCommandHandler' => 'getSaveCheckoutCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\SavePayPalOrderStatusCommandHandler' => 'getSavePayPalOrderStatusCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\UpdatePaymentMethodSelectedCommandHandler' => 'getUpdatePaymentMethodSelectedCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\EventSubscriber\\CheckoutEventSubscriber' => 'getCheckoutEventSubscriberService',
            'PrestaShop\\Module\\PrestashopCheckout\\CommandBus\\TacticianCommandBusFactory' => 'getTacticianCommandBusFactoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Configuration\\BatchConfigurationProcessor' => 'getBatchConfigurationProcessorService',
            'PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration' => 'getPrestaShopConfigurationService',
            'PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfigurationOptionsResolver' => 'getPrestaShopConfigurationOptionsResolverService',
            'PrestaShop\\Module\\PrestashopCheckout\\Context\\ContextStateManager' => 'getContextStateManagerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext' => 'getPrestaShopContextService',
            'PrestaShop\\Module\\PrestashopCheckout\\Environment\\Env' => 'getEnvService',
            'PrestaShop\\Module\\PrestashopCheckout\\Environment\\EnvLoader' => 'getEnvLoaderService',
            'PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter' => 'getSymfonyEventDispatcherAdapterService',
            'PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherFactory' => 'getSymfonyEventDispatcherFactoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\ExpressCheckout\\ExpressCheckoutConfiguration' => 'getExpressCheckoutConfigurationService',
            'PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceCollection' => 'getFundingSourceCollectionService',
            'PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceCollectionBuilder' => 'getFundingSourceCollectionBuilderService',
            'PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceConfiguration' => 'getFundingSourceConfigurationService',
            'PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceConfigurationRepository' => 'getFundingSourceConfigurationRepositoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceEligibilityConstraint' => 'getFundingSourceEligibilityConstraintService',
            'PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourcePresenter' => 'getFundingSourcePresenterService',
            'PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceProvider' => 'getFundingSourceProviderService',
            'PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceTranslationProvider' => 'getFundingSourceTranslationProviderService',
            'PrestaShop\\Module\\PrestashopCheckout\\Http\\CheckoutHttpClient' => 'getCheckoutHttpClientService',
            'PrestaShop\\Module\\PrestashopCheckout\\Http\\HttpClientFactory' => 'getHttpClientFactoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Http\\MaaslandHttpClient' => 'getMaaslandHttpClientService',
            'PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerConfiguration' => 'getLoggerConfigurationService',
            'PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerDirectory' => 'getLoggerDirectoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerFactory' => 'getLoggerFactoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerFilename' => 'getLoggerFilenameService',
            'PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerHandlerFactory' => 'getLoggerHandlerFactoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\OnBoarding\\Step\\LiveStep' => 'getLiveStepService',
            'PrestaShop\\Module\\PrestashopCheckout\\OnBoarding\\Step\\ValueBanner' => 'getValueBannerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\AddOrderPaymentCommandHandler' => 'getAddOrderPaymentCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\CreateOrderCommandHandler' => 'getCreateOrderCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\UpdateOrderStatusCommandHandler' => 'getUpdateOrderStatusCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\EventSubscriber\\OrderEventSubscriber' => 'getOrderEventSubscriberService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\Matrice\\CommandHandler\\UpdateOrderMatriceCommandHandler' => 'getUpdateOrderMatriceCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForApprovalReversedQueryHandler' => 'getGetOrderForApprovalReversedQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentCompletedQueryHandler' => 'getGetOrderForPaymentCompletedQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentDeniedQueryHandler' => 'getGetOrderForPaymentDeniedQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentPendingQueryHandler' => 'getGetOrderForPaymentPendingQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentRefundedQueryHandler' => 'getGetOrderForPaymentRefundedQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentReversedQueryHandler' => 'getGetOrderForPaymentReversedQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\Service\\CheckOrderAmount' => 'getCheckOrderAmountService',
            'PrestaShop\\Module\\PrestashopCheckout\\Order\\State\\Service\\OrderStateMapper' => 'getOrderStateMapperService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\AppleSetup' => 'getAppleSetupService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\Builder\\ApplePayPaymentRequestBuilder' => 'getApplePayPaymentRequestBuilderService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\Query\\GetApplePayPaymentRequestQueryHandler' => 'getGetApplePayPaymentRequestQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Customer\\CommandHandler\\SavePayPalCustomerCommandHandler' => 'getSavePayPalCustomerCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\GooglePay\\Builder\\GooglePayTransactionInfoBuilder' => 'getGooglePayTransactionInfoBuilderService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\GooglePay\\Query\\GetGooglePayTransactionInfoQueryHandler' => 'getGetGooglePayTransactionInfoQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\OAuth\\OAuthService' => 'getOAuthServiceService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\OAuth\\Query\\GetPayPalGetUserIdTokenQueryHandler' => 'getGetPayPalGetUserIdTokenQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CheckTransitionPayPalOrderStatusService' => 'getCheckTransitionPayPalOrderStatusServiceService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\CapturePayPalOrderCommandHandler' => 'getCapturePayPalOrderCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\CreatePayPalOrderCommandHandler' => 'getCreatePayPalOrderCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\SavePayPalOrderCommandHandler' => 'getSavePayPalOrderCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\UpdatePayPalOrderCommandHandler' => 'getUpdatePayPalOrderCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\EventSubscriber\\PayPalOrderEventSubscriber' => 'getPayPalOrderEventSubscriberService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\PayPalOrderStatus' => 'getPayPalOrderStatusService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\PayPalOrderSummaryViewBuilder' => 'getPayPalOrderSummaryViewBuilderService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\PayPalOrderTranslationProvider' => 'getPayPalOrderTranslationProviderService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetCurrentPayPalOrderStatusQueryHandler' => 'getGetCurrentPayPalOrderStatusQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForCartIdQueryHandler' => 'getGetPayPalOrderForCartIdQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForCheckoutCompletedQueryHandler' => 'getGetPayPalOrderForCheckoutCompletedQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForOrderConfirmationQueryHandler' => 'getGetPayPalOrderForOrderConfirmationQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderQueryHandler' => 'getGetPayPalOrderQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration' => 'getPayPalConfigurationService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalOrderProvider' => 'getPayPalOrderProviderService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalPayLaterConfiguration' => 'getPayPalPayLaterConfigurationService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\CommandHandler\\DeletePaymentTokenCommandHandler' => 'getDeletePaymentTokenCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\CommandHandler\\SavePaymentTokenCommandHandler' => 'getSavePaymentTokenCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\PaymentMethodTokenService' => 'getPaymentMethodTokenServiceService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\Query\\GetCustomerPaymentTokensQueryHandler' => 'getGetCustomerPaymentTokensQueryHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Capture\\CheckTransitionPayPalCaptureStatusService' => 'getCheckTransitionPayPalCaptureStatusServiceService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Capture\\EventSubscriber\\PayPalCaptureEventSubscriber' => 'getPayPalCaptureEventSubscriberService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Refund\\CommandHandler\\RefundPayPalCaptureCommandHandler' => 'getRefundPayPalCaptureCommandHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Sdk\\PayPalSdkConfigurationBuilder' => 'getPayPalSdkConfigurationBuilderService',
            'PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\ConfigurationModule' => 'getConfigurationModuleService',
            'PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\ContextModule' => 'getContextModuleService',
            'PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\PaypalModule' => 'getPaypalModuleService',
            'PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\StorePresenter' => 'getStorePresenterService',
            'PrestaShop\\Module\\PrestashopCheckout\\Provider\\PaymentMethodLogoProvider' => 'getPaymentMethodLogoProviderService',
            'PrestaShop\\Module\\PrestashopCheckout\\Repository\\CountryRepository' => 'getCountryRepositoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCodeRepository' => 'getPayPalCodeRepositoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCustomerRepository' => 'getPayPalCustomerRepositoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository' => 'getPayPalOrderRepositoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Repository\\PaymentTokenRepository' => 'getPaymentTokenRepositoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsAccountRepository' => 'getPsAccountRepositoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository' => 'getPsCheckoutCartRepositoryService',
            'PrestaShop\\Module\\PrestashopCheckout\\Routing\\Router' => 'getRouterService',
            'PrestaShop\\Module\\PrestashopCheckout\\ShopContext' => 'getShopContextService',
            'PrestaShop\\Module\\PrestashopCheckout\\Shop\\ShopProvider' => 'getShopProviderService',
            'PrestaShop\\Module\\PrestashopCheckout\\System\\SystemConfiguration' => 'getSystemConfigurationService',
            'PrestaShop\\Module\\PrestashopCheckout\\Translations\\Translations' => 'getTranslationsService',
            'PrestaShop\\Module\\PrestashopCheckout\\Validator\\BatchConfigurationValidator' => 'getBatchConfigurationValidatorService',
            'PrestaShop\\Module\\PrestashopCheckout\\Validator\\FrontControllerValidator' => 'getFrontControllerValidatorService',
            'PrestaShop\\Module\\PrestashopCheckout\\Validator\\MerchantValidator' => 'getMerchantValidatorService',
            'PrestaShop\\Module\\PrestashopCheckout\\Webhook\\WebhookEventConfigurationUpdatedHandler' => 'getWebhookEventConfigurationUpdatedHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Webhook\\WebhookHandler' => 'getWebhookHandlerService',
            'PrestaShop\\Module\\PrestashopCheckout\\Webhook\\WebhookSecretTokenService' => 'getWebhookSecretTokenServiceService',
            'PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookCategoryClient' => 'getFacebookCategoryClientService',
            'PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookClient' => 'getFacebookClientService',
            'PrestaShop\\Module\\PrestashopFacebook\\API\\EventSubscriber\\AccountSuspendedSubscriber' => 'getAccountSuspendedSubscriberService',
            'PrestaShop\\Module\\PrestashopFacebook\\API\\EventSubscriber\\ApiErrorSubscriber' => 'getApiErrorSubscriberService',
            'PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter' => 'getConfigurationAdapterService',
            'PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ToolsAdapter' => 'getToolsAdapterService',
            'PrestaShop\\Module\\PrestashopFacebook\\Buffer\\TemplateBuffer' => 'getTemplateBufferService',
            'PrestaShop\\Module\\PrestashopFacebook\\Config\\Env' => 'getEnv2Service',
            'PrestaShop\\Module\\PrestashopFacebook\\Dispatcher\\EventDispatcher' => 'getEventDispatcherService',
            'PrestaShop\\Module\\PrestashopFacebook\\Factory\\FacebookEssentialsApiClientFactory' => 'getFacebookEssentialsApiClientFactoryService',
            'PrestaShop\\Module\\PrestashopFacebook\\Factory\\PsApiClientFactory' => 'getPsApiClientFactoryService',
            'PrestaShop\\Module\\PrestashopFacebook\\Handler\\ApiConversionHandler' => 'getApiConversionHandlerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Handler\\CategoryMatchHandler' => 'getCategoryMatchHandlerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Handler\\ConfigurationHandler' => 'getConfigurationHandlerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Handler\\ErrorHandler\\ErrorHandler' => 'getErrorHandlerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Handler\\EventBusProductHandler' => 'getEventBusProductHandlerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Handler\\MessengerHandler' => 'getMessengerHandlerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Handler\\PixelHandler' => 'getPixelHandlerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Handler\\PrevalidationScanRefreshHandler' => 'getPrevalidationScanRefreshHandlerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Manager\\FbeFeatureManager' => 'getFbeFeatureManagerService',
            'PrestaShop\\Module\\PrestashopFacebook\\Presenter\\ModuleUpgradePresenter' => 'getModuleUpgradePresenterService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\AccessTokenProvider' => 'getAccessTokenProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\EventDataProvider' => 'getEventDataProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\FacebookDataProvider' => 'getFacebookDataProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\FbeDataProvider' => 'getFbeDataProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\FbeFeatureDataProvider' => 'getFbeFeatureDataProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\GoogleCategoryProvider' => 'getGoogleCategoryProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\MultishopDataProvider' => 'getMultishopDataProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\PrevalidationScanCacheProvider' => 'getPrevalidationScanCacheProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\PrevalidationScanDataProvider' => 'getPrevalidationScanDataProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\ProductAvailabilityProvider' => 'getProductAvailabilityProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\ProductSyncReportProvider' => 'getProductSyncReportProviderService',
            'PrestaShop\\Module\\PrestashopFacebook\\Repository\\GoogleCategoryRepository' => 'getGoogleCategoryRepositoryService',
            'PrestaShop\\Module\\PrestashopFacebook\\Repository\\ProductRepository' => 'getProductRepositoryService',
            'PrestaShop\\Module\\PrestashopFacebook\\Repository\\ServerInformationRepository' => 'getServerInformationRepositoryService',
            'PrestaShop\\Module\\PrestashopFacebook\\Repository\\ShopRepository' => 'getShopRepositoryService',
            'PrestaShop\\Module\\PrestashopFacebook\\Repository\\TabRepository' => 'getTabRepositoryService',
            'PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter' => 'getPsAccountsPresenterService',
            'PrestaShop\\Module\\PsAccounts\\Repository\\UserTokenRepository' => 'getUserTokenRepositoryService',
            'PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService' => 'getPsAccountsServiceService',
            'PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService' => 'getPsBillingServiceService',
            'PrestaShop\\Module\\Ps_facebook\\Tracker\\Segment' => 'getSegmentService',
            'PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingCarrierController' => 'getPsshippingCarrierControllerService',
            'PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingConfigurationController' => 'getPsshippingConfigurationControllerService',
            'PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingFaqController' => 'getPsshippingFaqControllerService',
            'PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingHomeController' => 'getPsshippingHomeControllerService',
            'PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingKeycloakAuthController' => 'getPsshippingKeycloakAuthControllerService',
            'PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingOrdersController' => 'getPsshippingOrdersControllerService',
            'PrestaShop\\Module\\Psshipping\\Domain\\Carriers\\CarrierRepository' => 'getCarrierRepositoryService',
            'PrestaShop\\Module\\Psshipping\\Domain\\Carriers\\PickupCarrierConfiguration' => 'getPickupCarrierConfigurationService',
            'PrestaShop\\Module\\Psshipping\\Domain\\Carriers\\StandardCarrierConfiguration' => 'getStandardCarrierConfigurationService',
            'PrestaShop\\Module\\Psshipping\\Handler\\ErrorHandler' => 'getErrorHandler2Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Adapter\\ConfigurationAdapter' => 'getConfigurationAdapter2Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Buffer\\TemplateBuffer' => 'getTemplateBuffer2Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Config\\Env' => 'getEnv3Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Conversion\\EnhancedConversionToggle' => 'getEnhancedConversionToggleService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Conversion\\UserDataProvider' => 'getUserDataProviderService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Handler\\ErrorHandler' => 'getErrorHandler3Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Handler\\RemarketingHookHandler' => 'getRemarketingHookHandlerService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\CartEventDataProvider' => 'getCartEventDataProviderService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\PageViewEventDataProvider' => 'getPageViewEventDataProviderService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\ProductDataProvider' => 'getProductDataProviderService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\PurchaseEventDataProvider' => 'getPurchaseEventDataProviderService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\VerificationTagDataProvider' => 'getVerificationTagDataProviderService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\AttributesRepository' => 'getAttributesRepositoryService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CarrierRepository' => 'getCarrierRepository2Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CategoryRepository' => 'getCategoryRepositoryService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CountryRepository' => 'getCountryRepository2Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CurrencyRepository' => 'getCurrencyRepositoryService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\LanguageRepository' => 'getLanguageRepositoryService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\ManufacturerRepository' => 'getManufacturerRepositoryService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\ProductRepository' => 'getProductRepository2Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\StateRepository' => 'getStateRepositoryService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\TabRepository' => 'getTabRepository2Service',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\TaxRepository' => 'getTaxRepositoryService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\VerificationTagRepository' => 'getVerificationTagRepositoryService',
            'PrestaShop\\Module\\PsxMarketingWithGoogle\\Tracker\\Segment' => 'getSegment2Service',
            'PrestaShop\\PrestaShop\\Adapter\\Configuration' => 'getConfigurationService',
            'PrestaShop\\PrestaShop\\Adapter\\ContextStateManager' => 'getContextStateManager2Service',
            'PrestaShop\\PrestaShop\\Adapter\\Currency\\CurrencyDataProvider' => 'getCurrencyDataProviderService',
            'PrestaShop\\PrestaShop\\Adapter\\LegacyContext' => 'getLegacyContextService',
            'PrestaShop\\PrestaShop\\Adapter\\Tools' => 'getToolsService',
            'PrestaShop\\PrestaShop\\Core\\Localization\\Locale\\Repository' => 'getRepositoryService',
            'PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts' => 'getPsAccountsService',
            'PrestaShop\\PsAccountsInstaller\\Installer\\Installer' => 'getInstallerService',
            'annotation_reader' => 'getAnnotationReaderService',
            'array' => 'getArrayService',
            'configuration' => 'getConfiguration2Service',
            'container.env_var_processors_locator' => 'getContainer_EnvVarProcessorsLocatorService',
            'context' => 'getContextService',
            'db' => 'getDbService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'hashing' => 'getHashingService',
            'klaviyops.klaviyo_api_wrapper' => 'getKlaviyops_KlaviyoApiWrapperService',
            'klaviyops.klaviyo_service.coupon_generator' => 'getKlaviyops_KlaviyoService_CouponGeneratorService',
            'klaviyops.klaviyo_service.customer_event_service' => 'getKlaviyops_KlaviyoService_CustomerEventServiceService',
            'klaviyops.klaviyo_service.order_event' => 'getKlaviyops_KlaviyoService_OrderEventService',
            'klaviyops.klaviyo_service.profile_event' => 'getKlaviyops_KlaviyoService_ProfileEventService',
            'klaviyops.module' => 'getKlaviyops_ModuleService',
            'klaviyops.prestashop_components.context' => 'getKlaviyops_PrestashopComponents_ContextService',
            'klaviyops.prestashop_services.cart_rule' => 'getKlaviyops_PrestashopServices_CartRuleService',
            'klaviyops.prestashop_services.context' => 'getKlaviyops_PrestashopServices_ContextService',
            'klaviyops.prestashop_services.customer' => 'getKlaviyops_PrestashopServices_CustomerService',
            'klaviyops.prestashop_services.datetime' => 'getKlaviyops_PrestashopServices_DatetimeService',
            'klaviyops.prestashop_services.logger' => 'getKlaviyops_PrestashopServices_LoggerService',
            'klaviyops.prestashop_services.order' => 'getKlaviyops_PrestashopServices_OrderService',
            'klaviyops.prestashop_services.product' => 'getKlaviyops_PrestashopServices_ProductService',
            'klaviyops.prestashop_services.validate' => 'getKlaviyops_PrestashopServices_ValidateService',
            'klaviyops.util_services.csv' => 'getKlaviyops_UtilServices_CsvService',
            'klaviyops.util_services.env' => 'getKlaviyops_UtilServices_EnvService',
            'prestashop.adapter.data_provider.country' => 'getPrestashop_Adapter_DataProvider_CountryService',
            'prestashop.adapter.environment' => 'getPrestashop_Adapter_EnvironmentService',
            'prestashop.adapter.module.repository.module_repository' => 'getPrestashop_Adapter_Module_Repository_ModuleRepositoryService',
            'prestashop.adapter.validate' => 'getPrestashop_Adapter_ValidateService',
            'prestashop.core.circuit_breaker.advanced_factory' => 'getPrestashop_Core_CircuitBreaker_AdvancedFactoryService',
            'prestashop.core.circuit_breaker.cache' => 'getPrestashop_Core_CircuitBreaker_CacheService',
            'prestashop.core.circuit_breaker.doctrine_cache' => 'getPrestashop_Core_CircuitBreaker_DoctrineCacheService',
            'prestashop.core.circuit_breaker.storage' => 'getPrestashop_Core_CircuitBreaker_StorageService',
            'prestashop.core.filter.front_end_object.cart' => 'getPrestashop_Core_Filter_FrontEndObject_CartService',
            'prestashop.core.filter.front_end_object.configuration' => 'getPrestashop_Core_Filter_FrontEndObject_ConfigurationService',
            'prestashop.core.filter.front_end_object.customer' => 'getPrestashop_Core_Filter_FrontEndObject_CustomerService',
            'prestashop.core.filter.front_end_object.main' => 'getPrestashop_Core_Filter_FrontEndObject_MainService',
            'prestashop.core.filter.front_end_object.product' => 'getPrestashop_Core_Filter_FrontEndObject_ProductService',
            'prestashop.core.filter.front_end_object.product_collection' => 'getPrestashop_Core_Filter_FrontEndObject_ProductCollectionService',
            'prestashop.core.filter.front_end_object.search_result_product' => 'getPrestashop_Core_Filter_FrontEndObject_SearchResultProductService',
            'prestashop.core.filter.front_end_object.search_result_product_collection' => 'getPrestashop_Core_Filter_FrontEndObject_SearchResultProductCollectionService',
            'prestashop.core.filter.front_end_object.shop' => 'getPrestashop_Core_Filter_FrontEndObject_ShopService',
            'prestashop.core.localization.cache.adapter' => 'getPrestashop_Core_Localization_Cache_AdapterService',
            'prestashop.core.localization.cldr.cache.adapter' => 'getPrestashop_Core_Localization_Cldr_Cache_AdapterService',
            'prestashop.core.localization.cldr.datalayer.locale_cache' => 'getPrestashop_Core_Localization_Cldr_Datalayer_LocaleCacheService',
            'prestashop.core.localization.cldr.datalayer.locale_reference' => 'getPrestashop_Core_Localization_Cldr_Datalayer_LocaleReferenceService',
            'prestashop.core.localization.cldr.locale_data_source' => 'getPrestashop_Core_Localization_Cldr_LocaleDataSourceService',
            'prestashop.core.localization.cldr.locale_repository' => 'getPrestashop_Core_Localization_Cldr_LocaleRepositoryService',
            'prestashop.core.localization.cldr.reader' => 'getPrestashop_Core_Localization_Cldr_ReaderService',
            'prestashop.core.localization.currency.datasource' => 'getPrestashop_Core_Localization_Currency_DatasourceService',
            'prestashop.core.localization.currency.middleware.cache' => 'getPrestashop_Core_Localization_Currency_Middleware_CacheService',
            'prestashop.core.localization.currency.middleware.database' => 'getPrestashop_Core_Localization_Currency_Middleware_DatabaseService',
            'prestashop.core.localization.currency.middleware.installed' => 'getPrestashop_Core_Localization_Currency_Middleware_InstalledService',
            'prestashop.core.localization.currency.middleware.reference' => 'getPrestashop_Core_Localization_Currency_Middleware_ReferenceService',
            'prestashop.core.localization.currency.repository' => 'getPrestashop_Core_Localization_Currency_RepositoryService',
            'prestashop.core.localization.locale.context_locale' => 'getPrestashop_Core_Localization_Locale_ContextLocaleService',
            'prestashop.core.string.character_cleaner' => 'getPrestashop_Core_String_CharacterCleanerService',
            'prestashop.database.naming_strategy' => 'getPrestashop_Database_NamingStrategyService',
            'prestashop.translation.translator_language_loader' => 'getPrestashop_Translation_TranslatorLanguageLoaderService',
            'ps_accounts.facade' => 'getPsAccounts_FacadeService',
            'ps_accounts.installer' => 'getPsAccounts_InstallerService',
            'ps_checkout.bus.command' => 'getPsCheckout_Bus_CommandService',
            'ps_checkout.cache.order' => 'getPsCheckout_Cache_OrderService',
            'ps_checkout.cache.paypal.capture' => 'getPsCheckout_Cache_Paypal_CaptureService',
            'ps_checkout.cache.paypal.order' => 'getPsCheckout_Cache_Paypal_OrderService',
            'ps_checkout.cache.pscheckoutcart' => 'getPsCheckout_Cache_PscheckoutcartService',
            'ps_checkout.db' => 'getPsCheckout_DbService',
            'ps_checkout.http.client' => 'getPsCheckout_Http_ClientService',
            'ps_checkout.logger' => 'getPsCheckout_LoggerService',
            'ps_checkout.logger.handler' => 'getPsCheckout_Logger_HandlerService',
            'ps_checkout.module' => 'getPsCheckout_ModuleService',
            'ps_checkout.module.version' => 'getPsCheckout_Module_VersionService',
            'ps_checkout.repository.paypal.code' => 'getPsCheckout_Repository_Paypal_CodeService',
            'ps_facebook' => 'getPsFacebookService',
            'ps_facebook.billing_env' => 'getPsFacebook_BillingEnvService',
            'ps_facebook.cache' => 'getPsFacebook_CacheService',
            'ps_facebook.context' => 'getPsFacebook_ContextService',
            'ps_facebook.controller' => 'getPsFacebook_ControllerService',
            'ps_facebook.cookie' => 'getPsFacebook_CookieService',
            'ps_facebook.currency' => 'getPsFacebook_CurrencyService',
            'ps_facebook.language' => 'getPsFacebook_LanguageService',
            'ps_facebook.link' => 'getPsFacebook_LinkService',
            'ps_facebook.shop' => 'getPsFacebook_ShopService',
            'ps_facebook.smarty' => 'getPsFacebook_SmartyService',
            'psshipping' => 'getPsshippingService',
            'psshipping.context' => 'getPsshipping_ContextService',
            'psshipping.helper.config' => 'getPsshipping_Helper_ConfigService',
            'psshipping.ps_billings_context_wrapper' => 'getPsshipping_PsBillingsContextWrapperService',
            'psshipping.ps_billings_facade' => 'getPsshipping_PsBillingsFacadeService',
            'psshipping.ps_billings_service' => 'getPsshipping_PsBillingsServiceService',
            'psxmarketingwithgoogle' => 'getPsxmarketingwithgoogleService',
            'psxmarketingwithgoogle.billing_env' => 'getPsxmarketingwithgoogle_BillingEnvService',
            'psxmarketingwithgoogle.cart' => 'getPsxmarketingwithgoogle_CartService',
            'psxmarketingwithgoogle.context' => 'getPsxmarketingwithgoogle_ContextService',
            'psxmarketingwithgoogle.controller' => 'getPsxmarketingwithgoogle_ControllerService',
            'psxmarketingwithgoogle.cookie' => 'getPsxmarketingwithgoogle_CookieService',
            'psxmarketingwithgoogle.country' => 'getPsxmarketingwithgoogle_CountryService',
            'psxmarketingwithgoogle.currency' => 'getPsxmarketingwithgoogle_CurrencyService',
            'psxmarketingwithgoogle.customer' => 'getPsxmarketingwithgoogle_CustomerService',
            'psxmarketingwithgoogle.db' => 'getPsxmarketingwithgoogle_DbService',
            'psxmarketingwithgoogle.language' => 'getPsxmarketingwithgoogle_LanguageService',
            'psxmarketingwithgoogle.link' => 'getPsxmarketingwithgoogle_LinkService',
            'psxmarketingwithgoogle.shop' => 'getPsxmarketingwithgoogle_ShopService',
            'psxmarketingwithgoogle.smarty' => 'getPsxmarketingwithgoogle_SmartyService',
            'prestashop.adapter.tools' => 'getPrestashop_Adapter_ToolsService',
        ];
        $this->aliases = [
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\GoogleCategoryProviderInterface' => 'PrestaShop\\Module\\PrestashopFacebook\\Provider\\GoogleCategoryProvider',
            'PrestaShop\\Module\\PrestashopFacebook\\Provider\\ProductAvailabilityProviderInterface' => 'PrestaShop\\Module\\PrestashopFacebook\\Provider\\ProductAvailabilityProvider',
            'PrestaShop\\PrestaShop\\Core\\Currency\\CurrencyDataProviderInterface' => 'PrestaShop\\PrestaShop\\Adapter\\Currency\\CurrencyDataProvider',
            'PrestaShop\\PrestaShop\\Core\\Localization\\LocaleInterface' => 'prestashop.core.localization.locale.context_locale',
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'prestashop.adapter.context_state_manager' => 'PrestaShop\\PrestaShop\\Adapter\\ContextStateManager',
            'prestashop.adapter.data_provider.currency' => 'PrestaShop\\PrestaShop\\Adapter\\Currency\\CurrencyDataProvider',
            'prestashop.adapter.legacy.configuration' => 'PrestaShop\\PrestaShop\\Adapter\\Configuration',
            'prestashop.adapter.legacy.context' => 'PrestaShop\\PrestaShop\\Adapter\\LegacyContext',
            'prestashop.core.localization.cldr.datalayer.top_layer' => 'prestashop.core.localization.cldr.datalayer.locale_cache',
            'prestashop.core.localization.currency.middleware.top_layer' => 'prestashop.core.localization.currency.middleware.cache',
            'prestashop.core.localization.locale.repository' => 'PrestaShop\\PrestaShop\\Core\\Localization\\Locale\\Repository',
        ];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return [
            '.service_locator.zH65KBq' => true,
            'Doctrine\\Bundle\\DoctrineBundle\\Controller\\ProfilerController' => true,
            'Doctrine\\Bundle\\DoctrineBundle\\Dbal\\ManagerRegistryAwareConnectionProvider' => true,
            'Doctrine\\Common\\Persistence\\ManagerRegistry' => true,
            'Doctrine\\DBAL\\Connection' => true,
            'Doctrine\\DBAL\\Connection $defaultConnection' => true,
            'Doctrine\\DBAL\\Driver\\Connection' => true,
            'Doctrine\\DBAL\\Tools\\Console\\Command\\RunSqlCommand' => true,
            'Doctrine\\ORM\\EntityManagerInterface' => true,
            'Doctrine\\ORM\\EntityManagerInterface $defaultEntityManager' => true,
            'Doctrine\\Persistence\\ManagerRegistry' => true,
            'PrestaShopBundle\\DependencyInjection\\CacheAdapterFactory' => true,
            'PrestaShopBundle\\DependencyInjection\\RuntimeConstEnvVarProcessor' => true,
            'PrestaShopCorp\\Billing\\Wrappers\\BillingContextWrapper' => true,
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\EventSubscriber\\PaymentMethodTokenEventSubscriber' => true,
            'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Refund\\EventSubscriber\\PayPalRefundEventSubscriber' => true,
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'cache.doctrine.orm.default.metadata' => true,
            'cache.doctrine.orm.default.query' => true,
            'cache.doctrine.orm.default.result' => true,
            'data_collector.doctrine' => true,
            'doctrine.cache_clear_metadata_command' => true,
            'doctrine.cache_clear_query_cache_command' => true,
            'doctrine.cache_clear_result_command' => true,
            'doctrine.cache_collection_region_command' => true,
            'doctrine.clear_entity_region_command' => true,
            'doctrine.clear_query_region_command' => true,
            'doctrine.database_create_command' => true,
            'doctrine.database_drop_command' => true,
            'doctrine.database_import_command' => true,
            'doctrine.dbal.connection' => true,
            'doctrine.dbal.connection.configuration' => true,
            'doctrine.dbal.connection.event_manager' => true,
            'doctrine.dbal.connection_factory' => true,
            'doctrine.dbal.default_connection.configuration' => true,
            'doctrine.dbal.default_connection.event_manager' => true,
            'doctrine.dbal.event_manager' => true,
            'doctrine.dbal.logger' => true,
            'doctrine.dbal.logger.backtrace' => true,
            'doctrine.dbal.logger.chain' => true,
            'doctrine.dbal.logger.chain.default' => true,
            'doctrine.dbal.logger.profiling' => true,
            'doctrine.dbal.logger.profiling.default' => true,
            'doctrine.dbal.schema_asset_filter_manager' => true,
            'doctrine.dbal.well_known_schema_asset_filter' => true,
            'doctrine.ensure_production_settings_command' => true,
            'doctrine.mapping_convert_command' => true,
            'doctrine.mapping_import_command' => true,
            'doctrine.mapping_info_command' => true,
            'doctrine.orm.configuration' => true,
            'doctrine.orm.container_repository_factory' => true,
            'doctrine.orm.default_annotation_metadata_driver' => true,
            'doctrine.orm.default_configuration' => true,
            'doctrine.orm.default_entity_listener_resolver' => true,
            'doctrine.orm.default_entity_manager.event_manager' => true,
            'doctrine.orm.default_entity_manager.property_info_extractor' => true,
            'doctrine.orm.default_entity_manager.validator_loader' => true,
            'doctrine.orm.default_listeners.attach_entity_listeners' => true,
            'doctrine.orm.default_manager_configurator' => true,
            'doctrine.orm.default_metadata_cache' => true,
            'doctrine.orm.default_metadata_driver' => true,
            'doctrine.orm.default_query_cache' => true,
            'doctrine.orm.default_result_cache' => true,
            'doctrine.orm.entity_manager.abstract' => true,
            'doctrine.orm.listeners.resolve_target_entity' => true,
            'doctrine.orm.manager_configurator.abstract' => true,
            'doctrine.orm.messenger.event_subscriber.doctrine_clear_entity_manager' => true,
            'doctrine.orm.metadata.annotation_reader' => true,
            'doctrine.orm.naming_strategy.default' => true,
            'doctrine.orm.naming_strategy.underscore' => true,
            'doctrine.orm.naming_strategy.underscore_number_aware' => true,
            'doctrine.orm.proxy_cache_warmer' => true,
            'doctrine.orm.quote_strategy.ansi' => true,
            'doctrine.orm.quote_strategy.default' => true,
            'doctrine.orm.security.user.provider' => true,
            'doctrine.orm.validator.unique' => true,
            'doctrine.orm.validator_initializer' => true,
            'doctrine.query_dql_command' => true,
            'doctrine.query_sql_command' => true,
            'doctrine.schema_create_command' => true,
            'doctrine.schema_drop_command' => true,
            'doctrine.schema_update_command' => true,
            'doctrine.schema_validate_command' => true,
            'doctrine.twig.doctrine_extension' => true,
            'form.type.entity' => true,
            'form.type_guesser.doctrine' => true,
            'messenger.middleware.doctrine_close_connection' => true,
            'messenger.middleware.doctrine_open_transaction_logger' => true,
            'messenger.middleware.doctrine_ping_connection' => true,
            'messenger.middleware.doctrine_transaction' => true,
            'messenger.transport.doctrine.factory' => true,
            'ps_checkout.cache.array.paypal.capture' => true,
            'ps_checkout.cache.array.paypal.order' => true,
            'ps_checkout.cache.filesystem.paypal.capture' => true,
            'ps_checkout.cache.filesystem.paypal.order' => true,
            'ps_checkout.event.dispatcher.symfony' => true,
            'ps_checkout.tactician.bus' => true,
        ];
    }

    /**
     * Gets the public 'PrestaShopCorp\Billing\Presenter\BillingPresenter' shared service.
     *
     * @return \PrestaShopCorp\Billing\Presenter\BillingPresenter
     */
    protected function getBillingPresenterService()
    {
        return $this->services['PrestaShopCorp\\Billing\\Presenter\\BillingPresenter'] = new \PrestaShopCorp\Billing\Presenter\BillingPresenter(($this->privates['PrestaShopCorp\\Billing\\Wrappers\\BillingContextWrapper'] ?? $this->getBillingContextWrapperService()), ($this->services['ps_facebook'] ?? $this->getPsFacebookService()));
    }

    /**
     * Gets the public 'PrestaShopCorp\Billing\Services\BillingService' shared service.
     *
     * @return \PrestaShopCorp\Billing\Services\BillingService
     */
    protected function getBillingServiceService()
    {
        return $this->services['PrestaShopCorp\\Billing\\Services\\BillingService'] = new \PrestaShopCorp\Billing\Services\BillingService(($this->privates['PrestaShopCorp\\Billing\\Wrappers\\BillingContextWrapper'] ?? $this->getBillingContextWrapperService()), ($this->services['ps_facebook'] ?? $this->getPsFacebookService()));
    }

    /**
     * Gets the public 'PrestaShop\ModuleLibCacheDirectoryProvider\Cache\CacheDirectoryProvider' shared service.
     *
     * @return \PrestaShop\ModuleLibCacheDirectoryProvider\Cache\CacheDirectoryProvider
     */
    protected function getCacheDirectoryProviderService()
    {
        return $this->services['PrestaShop\\ModuleLibCacheDirectoryProvider\\Cache\\CacheDirectoryProvider'] = new \PrestaShop\ModuleLibCacheDirectoryProvider\Cache\CacheDirectoryProvider('8.2.0', 'C:\\xampp\\htdocs\\ctinys', true);
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Adapter\LanguageAdapter' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Adapter\LanguageAdapter
     */
    protected function getLanguageAdapterService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Adapter\\LanguageAdapter'] = new \PrestaShop\Module\PrestashopCheckout\Adapter\LanguageAdapter(($this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] ?? $this->getShopContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Builder\Configuration\CheckoutClientConfigurationBuilder' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Builder\Configuration\CheckoutClientConfigurationBuilder
     */
    protected function getCheckoutClientConfigurationBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Builder\\Configuration\\CheckoutClientConfigurationBuilder'] = new \PrestaShop\Module\PrestashopCheckout\Builder\Configuration\CheckoutClientConfigurationBuilder(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Environment\\Env'] ?? $this->getEnvService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Routing\\Router'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Routing\\Router'] = new \PrestaShop\Module\PrestashopCheckout\Routing\Router())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] ?? $this->getShopContextService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsAccountRepository'] ?? $this->getPsAccountRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerConfiguration'] ?? $this->getLoggerConfigurationService()), ($this->services['ps_checkout.logger'] ?? $this->getPsCheckout_LoggerService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Builder\Configuration\MaaslandHttpClientConfigurationBuilder' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Builder\Configuration\MaaslandHttpClientConfigurationBuilder
     */
    protected function getMaaslandHttpClientConfigurationBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Builder\\Configuration\\MaaslandHttpClientConfigurationBuilder'] = new \PrestaShop\Module\PrestashopCheckout\Builder\Configuration\MaaslandHttpClientConfigurationBuilder(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Environment\\Env'] ?? $this->getEnvService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Routing\\Router'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Routing\\Router'] = new \PrestaShop\Module\PrestashopCheckout\Routing\Router())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] ?? $this->getShopContextService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsAccountRepository'] ?? $this->getPsAccountRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerConfiguration'] ?? $this->getLoggerConfigurationService()), ($this->services['ps_checkout.logger'] ?? $this->getPsCheckout_LoggerService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Builder\ModuleLink\ModuleLinkBuilder' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Builder\ModuleLink\ModuleLinkBuilder
     */
    protected function getModuleLinkBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Builder\\ModuleLink\\ModuleLinkBuilder'] = new \PrestaShop\Module\PrestashopCheckout\Builder\ModuleLink\ModuleLinkBuilder();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Checkout\CheckoutChecker' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Checkout\CheckoutChecker
     */
    protected function getCheckoutCheckerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CheckoutChecker'] = new \PrestaShop\Module\PrestashopCheckout\Checkout\CheckoutChecker(($this->services['ps_checkout.logger'] ?? $this->getPsCheckout_LoggerService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository'] ?? $this->getPayPalOrderRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\CancelCheckoutCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\CancelCheckoutCommandHandler
     */
    protected function getCancelCheckoutCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\CancelCheckoutCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\CancelCheckoutCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\SaveCheckoutCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\SaveCheckoutCommandHandler
     */
    protected function getSaveCheckoutCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\SaveCheckoutCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\SaveCheckoutCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\SavePayPalOrderStatusCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\SavePayPalOrderStatusCommandHandler
     */
    protected function getSavePayPalOrderStatusCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\SavePayPalOrderStatusCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\SavePayPalOrderStatusCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository'] ?? $this->getPayPalOrderRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\UpdatePaymentMethodSelectedCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\UpdatePaymentMethodSelectedCommandHandler
     */
    protected function getUpdatePaymentMethodSelectedCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\UpdatePaymentMethodSelectedCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\Checkout\CommandHandler\UpdatePaymentMethodSelectedCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Checkout\EventSubscriber\CheckoutEventSubscriber' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Checkout\EventSubscriber\CheckoutEventSubscriber
     */
    protected function getCheckoutEventSubscriberService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\EventSubscriber\\CheckoutEventSubscriber'] = new \PrestaShop\Module\PrestashopCheckout\Checkout\EventSubscriber\CheckoutEventSubscriber(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CheckoutChecker'] ?? $this->getCheckoutCheckerService()), ($this->services['ps_checkout.bus.command'] ?? $this->getPsCheckout_Bus_CommandService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\CommandBus\TacticianCommandBusFactory' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\CommandBus\TacticianCommandBusFactory
     */
    protected function getTacticianCommandBusFactoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\CommandBus\\TacticianCommandBusFactory'] = new \PrestaShop\Module\PrestashopCheckout\CommandBus\TacticianCommandBusFactory(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()), ($this->services['ps_checkout.logger'] ?? $this->getPsCheckout_LoggerService()), ['PrestaShop\\Module\\PrestashopCheckout\\Order\\Command\\AddOrderPaymentCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\AddOrderPaymentCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Command\\CreateOrderCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\CreateOrderCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Command\\UpdateOrderStatusCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\UpdateOrderStatusCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Matrice\\Command\\UpdateOrderMatriceCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Matrice\\CommandHandler\\UpdateOrderMatriceCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Command\\CreatePayPalOrderCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\CreatePayPalOrderCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Command\\UpdatePayPalOrderCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\UpdatePayPalOrderCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Command\\CapturePayPalOrderCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\CapturePayPalOrderCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\Command\\CancelCheckoutCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\CancelCheckoutCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\Command\\SaveCheckoutCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\SaveCheckoutCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\Command\\SavePayPalOrderStatusCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\SavePayPalOrderStatusCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\Command\\UpdatePaymentMethodSelectedCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CommandHandler\\UpdatePaymentMethodSelectedCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Refund\\Command\\RefundPayPalCaptureCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Refund\\CommandHandler\\RefundPayPalCaptureCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Query\\GetOrderForPaymentCompletedQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentCompletedQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Query\\GetOrderForPaymentDeniedQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentDeniedQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Query\\GetOrderForPaymentPendingQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentPendingQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Query\\GetOrderForPaymentRefundedQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentRefundedQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Query\\GetOrderForPaymentReversedQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentReversedQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\Order\\Query\\GetOrderForApprovalReversedQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForApprovalReversedQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Query\\GetPayPalOrderForCartIdQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForCartIdQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Query\\GetCurrentPayPalOrderStatusQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetCurrentPayPalOrderStatusQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Query\\GetPayPalOrderQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Query\\GetPayPalOrderForCheckoutCompletedQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForCheckoutCompletedQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Query\\GetPayPalOrderForOrderConfirmationQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForOrderConfirmationQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\Command\\SavePaymentTokenCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\CommandHandler\\SavePaymentTokenCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\Command\\DeletePaymentTokenCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\CommandHandler\\DeletePaymentTokenCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\Query\\GetCustomerPaymentTokensQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\Query\\GetCustomerPaymentTokensQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Customer\\Command\\SavePayPalCustomerCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Customer\\CommandHandler\\SavePayPalCustomerCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\OAuth\\Query\\GetPayPalGetUserIdTokenQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\OAuth\\Query\\GetPayPalGetUserIdTokenQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\Command\\SavePayPalOrderCommand' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\SavePayPalOrderCommandHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\GooglePay\\Query\\GetGooglePayTransactionInfoQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\GooglePay\\Query\\GetGooglePayTransactionInfoQueryHandler', 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\Query\\GetApplePayPaymentRequestQuery' => 'PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\Query\\GetApplePayPaymentRequestQueryHandler']);
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Configuration\BatchConfigurationProcessor' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Configuration\BatchConfigurationProcessor
     */
    protected function getBatchConfigurationProcessorService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\BatchConfigurationProcessor'] = new \PrestaShop\Module\PrestashopCheckout\Configuration\BatchConfigurationProcessor(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Configuration\PrestaShopConfiguration' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Configuration\PrestaShopConfiguration
     */
    protected function getPrestaShopConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] = new \PrestaShop\Module\PrestashopCheckout\Configuration\PrestaShopConfiguration(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfigurationOptionsResolver'] ?? $this->getPrestaShopConfigurationOptionsResolverService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Configuration\PrestaShopConfigurationOptionsResolver' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Configuration\PrestaShopConfigurationOptionsResolver
     */
    protected function getPrestaShopConfigurationOptionsResolverService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfigurationOptionsResolver'] = new \PrestaShop\Module\PrestashopCheckout\Configuration\PrestaShopConfigurationOptionsResolver(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Shop\\ShopProvider'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Shop\\ShopProvider'] = new \PrestaShop\Module\PrestashopCheckout\Shop\ShopProvider()))->getIdentifier());
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Context\ContextStateManager' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Context\ContextStateManager
     */
    protected function getContextStateManagerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\ContextStateManager'] = new \PrestaShop\Module\PrestashopCheckout\Context\ContextStateManager();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext
     */
    protected function getPrestaShopContextService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Environment\Env' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Environment\Env
     */
    protected function getEnvService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Environment\\Env'] = new \PrestaShop\Module\PrestashopCheckout\Environment\Env(($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Environment\EnvLoader' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Environment\EnvLoader
     */
    protected function getEnvLoaderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Environment\\EnvLoader'] = new \PrestaShop\Module\PrestashopCheckout\Environment\EnvLoader();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Event\SymfonyEventDispatcherAdapter' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Event\SymfonyEventDispatcherAdapter
     */
    protected function getSymfonyEventDispatcherAdapterService()
    {
        $a = ($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService());

        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] = new \PrestaShop\Module\PrestashopCheckout\Event\SymfonyEventDispatcherAdapter(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherFactory'] ?? $this->getSymfonyEventDispatcherFactoryService())->create([0 => ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\EventSubscriber\\CheckoutEventSubscriber'] ?? $this->getCheckoutEventSubscriberService()), 1 => ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\EventSubscriber\\OrderEventSubscriber'] ?? $this->getOrderEventSubscriberService()), 2 => ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\EventSubscriber\\PayPalOrderEventSubscriber'] ?? $this->getPayPalOrderEventSubscriberService()), 3 => ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Capture\\EventSubscriber\\PayPalCaptureEventSubscriber'] ?? $this->getPayPalCaptureEventSubscriberService()), 4 => new \PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Refund\EventSubscriber\PayPalRefundEventSubscriber($a, ($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\State\\Service\\OrderStateMapper'] ?? $this->getOrderStateMapperService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalOrderProvider'] ?? $this->getPayPalOrderProviderService())), 5 => new \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\EventSubscriber\PaymentMethodTokenEventSubscriber($a, ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository'] ?? $this->getPayPalOrderRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PaymentTokenRepository'] ?? $this->getPaymentTokenRepositoryService()), ($this->services['ps_checkout.logger'] ?? $this->getPsCheckout_LoggerService()))]));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Event\SymfonyEventDispatcherFactory' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Event\SymfonyEventDispatcherFactory
     */
    protected function getSymfonyEventDispatcherFactoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherFactory'] = new \PrestaShop\Module\PrestashopCheckout\Event\SymfonyEventDispatcherFactory(($this->services['ps_checkout.logger'] ?? $this->getPsCheckout_LoggerService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerConfiguration'] ?? $this->getLoggerConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\ExpressCheckout\ExpressCheckoutConfiguration' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\ExpressCheckout\ExpressCheckoutConfiguration
     */
    protected function getExpressCheckoutConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\ExpressCheckout\\ExpressCheckoutConfiguration'] = new \PrestaShop\Module\PrestashopCheckout\ExpressCheckout\ExpressCheckoutConfiguration(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceCollection' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceCollection
     */
    protected function getFundingSourceCollectionService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceCollection'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceCollection(($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceCollectionBuilder'] ?? $this->getFundingSourceCollectionBuilderService())->create());
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceCollectionBuilder' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceCollectionBuilder
     */
    protected function getFundingSourceCollectionBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceCollectionBuilder'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceCollectionBuilder(($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceConfiguration'] ?? $this->getFundingSourceConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceEligibilityConstraint'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceEligibilityConstraint'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceEligibilityConstraint())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceConfiguration' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceConfiguration
     */
    protected function getFundingSourceConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceConfiguration'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceConfiguration(($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceConfigurationRepository'] ?? $this->getFundingSourceConfigurationRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceConfigurationRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceConfigurationRepository
     */
    protected function getFundingSourceConfigurationRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceConfigurationRepository'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceConfigurationRepository(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceEligibilityConstraint' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceEligibilityConstraint
     */
    protected function getFundingSourceEligibilityConstraintService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceEligibilityConstraint'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceEligibilityConstraint();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourcePresenter' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourcePresenter
     */
    protected function getFundingSourcePresenterService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourcePresenter'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourcePresenter(($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceTranslationProvider'] ?? $this->getFundingSourceTranslationProviderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\CountryRepository'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\CountryRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\CountryRepository())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Provider\\PaymentMethodLogoProvider'] ?? $this->getPaymentMethodLogoProviderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceProvider
     */
    protected function getFundingSourceProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceProvider'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceProvider(($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceCollectionBuilder'] ?? $this->getFundingSourceCollectionBuilderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourcePresenter'] ?? $this->getFundingSourcePresenterService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PaymentTokenRepository'] ?? $this->getPaymentTokenRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceTranslationProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceTranslationProvider
     */
    protected function getFundingSourceTranslationProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceTranslationProvider'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceTranslationProvider(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Http\CheckoutHttpClient' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Http\CheckoutHttpClient
     */
    protected function getCheckoutHttpClientService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\CheckoutHttpClient'] = new \PrestaShop\Module\PrestashopCheckout\Http\CheckoutHttpClient(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Builder\\Configuration\\CheckoutClientConfigurationBuilder'] ?? $this->getCheckoutClientConfigurationBuilderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Http\HttpClientFactory' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Http\HttpClientFactory
     */
    protected function getHttpClientFactoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\HttpClientFactory'] = new \PrestaShop\Module\PrestashopCheckout\Http\HttpClientFactory();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Http\MaaslandHttpClient' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Http\MaaslandHttpClient
     */
    protected function getMaaslandHttpClientService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\MaaslandHttpClient'] = new \PrestaShop\Module\PrestashopCheckout\Http\MaaslandHttpClient(($this->services['ps_checkout.http.client'] ?? $this->getPsCheckout_Http_ClientService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Logger\LoggerConfiguration' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Logger\LoggerConfiguration
     */
    protected function getLoggerConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerConfiguration'] = new \PrestaShop\Module\PrestashopCheckout\Logger\LoggerConfiguration(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Logger\LoggerDirectory' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Logger\LoggerDirectory
     */
    protected function getLoggerDirectoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerDirectory'] = new \PrestaShop\Module\PrestashopCheckout\Logger\LoggerDirectory('8.2.0', 'C:\\xampp\\htdocs\\ctinys');
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Logger\LoggerFactory' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Logger\LoggerFactory
     */
    protected function getLoggerFactoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerFactory'] = new \PrestaShop\Module\PrestashopCheckout\Logger\LoggerFactory(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService())->name, ($this->services['ps_checkout.logger.handler'] ?? $this->getPsCheckout_Logger_HandlerService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Logger\LoggerFilename' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Logger\LoggerFilename
     */
    protected function getLoggerFilenameService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerFilename'] = new \PrestaShop\Module\PrestashopCheckout\Logger\LoggerFilename(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService())->name, ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Shop\\ShopProvider'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Shop\\ShopProvider'] = new \PrestaShop\Module\PrestashopCheckout\Shop\ShopProvider()))->getIdentifier());
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Logger\LoggerHandlerFactory' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Logger\LoggerHandlerFactory
     */
    protected function getLoggerHandlerFactoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerHandlerFactory'] = new \PrestaShop\Module\PrestashopCheckout\Logger\LoggerHandlerFactory(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerDirectory'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerDirectory'] = new \PrestaShop\Module\PrestashopCheckout\Logger\LoggerDirectory('8.2.0', 'C:\\xampp\\htdocs\\ctinys')))->getPath(), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerFilename'] ?? $this->getLoggerFilenameService())->get(), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerConfiguration'] ?? $this->getLoggerConfigurationService())->getMaxFiles(), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerConfiguration'] ?? $this->getLoggerConfigurationService())->getLevel());
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\OnBoarding\Step\LiveStep' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\OnBoarding\Step\LiveStep
     */
    protected function getLiveStepService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\OnBoarding\\Step\\LiveStep'] = new \PrestaShop\Module\PrestashopCheckout\OnBoarding\Step\LiveStep(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\OnBoarding\Step\ValueBanner' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\OnBoarding\Step\ValueBanner
     */
    protected function getValueBannerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\OnBoarding\\Step\\ValueBanner'] = new \PrestaShop\Module\PrestashopCheckout\OnBoarding\Step\ValueBanner(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\AddOrderPaymentCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\AddOrderPaymentCommandHandler
     */
    protected function getAddOrderPaymentCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\AddOrderPaymentCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\AddOrderPaymentCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] ?? $this->getSymfonyEventDispatcherAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceTranslationProvider'] ?? $this->getFundingSourceTranslationProviderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\CreateOrderCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\CreateOrderCommandHandler
     */
    protected function getCreateOrderCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\CreateOrderCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\CreateOrderCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\ContextStateManager'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\ContextStateManager'] = new \PrestaShop\Module\PrestashopCheckout\Context\ContextStateManager())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] ?? $this->getSymfonyEventDispatcherAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\State\\Service\\OrderStateMapper'] ?? $this->getOrderStateMapperService()), ($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\Service\\CheckOrderAmount'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\Service\\CheckOrderAmount'] = new \PrestaShop\Module\PrestashopCheckout\Order\Service\CheckOrderAmount())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceTranslationProvider'] ?? $this->getFundingSourceTranslationProviderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\UpdateOrderStatusCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\UpdateOrderStatusCommandHandler
     */
    protected function getUpdateOrderStatusCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\CommandHandler\\UpdateOrderStatusCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\CommandHandler\UpdateOrderStatusCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] ?? $this->getSymfonyEventDispatcherAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\EventSubscriber\OrderEventSubscriber' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\EventSubscriber\OrderEventSubscriber
     */
    protected function getOrderEventSubscriberService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\EventSubscriber\\OrderEventSubscriber'] = new \PrestaShop\Module\PrestashopCheckout\Order\EventSubscriber\OrderEventSubscriber(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()), ($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\Matrice\CommandHandler\UpdateOrderMatriceCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\Matrice\CommandHandler\UpdateOrderMatriceCommandHandler
     */
    protected function getUpdateOrderMatriceCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\Matrice\\CommandHandler\\UpdateOrderMatriceCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\Matrice\CommandHandler\UpdateOrderMatriceCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] ?? $this->getSymfonyEventDispatcherAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForApprovalReversedQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForApprovalReversedQueryHandler
     */
    protected function getGetOrderForApprovalReversedQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForApprovalReversedQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForApprovalReversedQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentCompletedQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentCompletedQueryHandler
     */
    protected function getGetOrderForPaymentCompletedQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentCompletedQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentCompletedQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentDeniedQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentDeniedQueryHandler
     */
    protected function getGetOrderForPaymentDeniedQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentDeniedQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentDeniedQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentPendingQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentPendingQueryHandler
     */
    protected function getGetOrderForPaymentPendingQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentPendingQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentPendingQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentRefundedQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentRefundedQueryHandler
     */
    protected function getGetOrderForPaymentRefundedQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentRefundedQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentRefundedQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentReversedQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentReversedQueryHandler
     */
    protected function getGetOrderForPaymentReversedQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\QueryHandler\\GetOrderForPaymentReversedQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\Order\QueryHandler\GetOrderForPaymentReversedQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\Service\CheckOrderAmount' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\Service\CheckOrderAmount
     */
    protected function getCheckOrderAmountService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\Service\\CheckOrderAmount'] = new \PrestaShop\Module\PrestashopCheckout\Order\Service\CheckOrderAmount();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Order\State\Service\OrderStateMapper' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Order\State\Service\OrderStateMapper
     */
    protected function getOrderStateMapperService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\State\\Service\\OrderStateMapper'] = new \PrestaShop\Module\PrestashopCheckout\Order\State\Service\OrderStateMapper(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\AppleSetup' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\AppleSetup
     */
    protected function getAppleSetupService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\AppleSetup'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\AppleSetup(($this->services['PrestaShop\\Module\\PrestashopCheckout\\System\\SystemConfiguration'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\System\\SystemConfiguration'] = new \PrestaShop\Module\PrestashopCheckout\System\SystemConfiguration())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\Builder\ApplePayPaymentRequestBuilder' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\Builder\ApplePayPaymentRequestBuilder
     */
    protected function getApplePayPaymentRequestBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\Builder\\ApplePayPaymentRequestBuilder'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\Builder\ApplePayPaymentRequestBuilder(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Translations\\Translations'] ?? $this->getTranslationsService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\Query\GetApplePayPaymentRequestQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\Query\GetApplePayPaymentRequestQueryHandler
     */
    protected function getGetApplePayPaymentRequestQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\Query\\GetApplePayPaymentRequestQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\ApplePay\Query\GetApplePayPaymentRequestQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\ApplePay\\Builder\\ApplePayPaymentRequestBuilder'] ?? $this->getApplePayPaymentRequestBuilderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Customer\CommandHandler\SavePayPalCustomerCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Customer\CommandHandler\SavePayPalCustomerCommandHandler
     */
    protected function getSavePayPalCustomerCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Customer\\CommandHandler\\SavePayPalCustomerCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Customer\CommandHandler\SavePayPalCustomerCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCustomerRepository'] ?? $this->getPayPalCustomerRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\GooglePay\Builder\GooglePayTransactionInfoBuilder' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\GooglePay\Builder\GooglePayTransactionInfoBuilder
     */
    protected function getGooglePayTransactionInfoBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\GooglePay\\Builder\\GooglePayTransactionInfoBuilder'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\GooglePay\Builder\GooglePayTransactionInfoBuilder(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Translations\\Translations'] ?? $this->getTranslationsService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\GooglePay\Query\GetGooglePayTransactionInfoQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\GooglePay\Query\GetGooglePayTransactionInfoQueryHandler
     */
    protected function getGetGooglePayTransactionInfoQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\GooglePay\\Query\\GetGooglePayTransactionInfoQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\GooglePay\Query\GetGooglePayTransactionInfoQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\GooglePay\\Builder\\GooglePayTransactionInfoBuilder'] ?? $this->getGooglePayTransactionInfoBuilderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\OAuth\OAuthService' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\OAuth\OAuthService
     */
    protected function getOAuthServiceService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\OAuth\\OAuthService'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\OAuth\OAuthService(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\CheckoutHttpClient'] ?? $this->getCheckoutHttpClientService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\OAuth\Query\GetPayPalGetUserIdTokenQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\OAuth\Query\GetPayPalGetUserIdTokenQueryHandler
     */
    protected function getGetPayPalGetUserIdTokenQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\OAuth\\Query\\GetPayPalGetUserIdTokenQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\OAuth\Query\GetPayPalGetUserIdTokenQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\OAuth\\OAuthService'] ?? $this->getOAuthServiceService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCustomerRepository'] ?? $this->getPayPalCustomerRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\CheckTransitionPayPalOrderStatusService' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CheckTransitionPayPalOrderStatusService
     */
    protected function getCheckTransitionPayPalOrderStatusServiceService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CheckTransitionPayPalOrderStatusService'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CheckTransitionPayPalOrderStatusService();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\CapturePayPalOrderCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\CapturePayPalOrderCommandHandler
     */
    protected function getCapturePayPalOrderCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\CapturePayPalOrderCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\CapturePayPalOrderCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\MaaslandHttpClient'] ?? $this->getMaaslandHttpClientService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] ?? $this->getSymfonyEventDispatcherAdapterService()), ($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCustomerRepository'] ?? $this->getPayPalCustomerRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository'] ?? $this->getPayPalOrderRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()), ($this->services['ps_checkout.logger'] ?? $this->getPsCheckout_LoggerService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\CreatePayPalOrderCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\CreatePayPalOrderCommandHandler
     */
    protected function getCreatePayPalOrderCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\CreatePayPalOrderCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\CreatePayPalOrderCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\MaaslandHttpClient'] ?? $this->getMaaslandHttpClientService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] ?? $this->getShopContextService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] ?? $this->getSymfonyEventDispatcherAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCustomerRepository'] ?? $this->getPayPalCustomerRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PaymentTokenRepository'] ?? $this->getPaymentTokenRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\SavePayPalOrderCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\SavePayPalOrderCommandHandler
     */
    protected function getSavePayPalOrderCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\SavePayPalOrderCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\SavePayPalOrderCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository'] ?? $this->getPayPalOrderRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\UpdatePayPalOrderCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\UpdatePayPalOrderCommandHandler
     */
    protected function getUpdatePayPalOrderCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CommandHandler\\UpdatePayPalOrderCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CommandHandler\UpdatePayPalOrderCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\MaaslandHttpClient'] ?? $this->getMaaslandHttpClientService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] ?? $this->getSymfonyEventDispatcherAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] ?? $this->getShopContextService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalOrderProvider'] ?? $this->getPayPalOrderProviderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\EventSubscriber\PayPalOrderEventSubscriber' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\EventSubscriber\PayPalOrderEventSubscriber
     */
    protected function getPayPalOrderEventSubscriberService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\EventSubscriber\\PayPalOrderEventSubscriber'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\EventSubscriber\PayPalOrderEventSubscriber(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()), ($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Checkout\\CheckoutChecker'] ?? $this->getCheckoutCheckerService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CheckTransitionPayPalOrderStatusService'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\CheckTransitionPayPalOrderStatusService'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\CheckTransitionPayPalOrderStatusService())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\State\\Service\\OrderStateMapper'] ?? $this->getOrderStateMapperService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository'] ?? $this->getPayPalOrderRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderStatus' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderStatus
     */
    protected function getPayPalOrderStatusService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\PayPalOrderStatus'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderStatus();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderSummaryViewBuilder' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderSummaryViewBuilder
     */
    protected function getPayPalOrderSummaryViewBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\PayPalOrderSummaryViewBuilder'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderSummaryViewBuilder(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalOrderProvider'] ?? $this->getPayPalOrderProviderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Routing\\Router'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Routing\\Router'] = new \PrestaShop\Module\PrestashopCheckout\Routing\Router())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\PayPalOrderTranslationProvider'] ?? $this->getPayPalOrderTranslationProviderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] ?? $this->getShopContextService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository'] ?? $this->getPayPalOrderRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderTranslationProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderTranslationProvider
     */
    protected function getPayPalOrderTranslationProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\PayPalOrderTranslationProvider'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\PayPalOrderTranslationProvider(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Translations\\Translations'] ?? $this->getTranslationsService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceTranslationProvider'] ?? $this->getFundingSourceTranslationProviderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetCurrentPayPalOrderStatusQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetCurrentPayPalOrderStatusQueryHandler
     */
    protected function getGetCurrentPayPalOrderStatusQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetCurrentPayPalOrderStatusQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetCurrentPayPalOrderStatusQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForCartIdQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForCartIdQueryHandler
     */
    protected function getGetPayPalOrderForCartIdQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForCartIdQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForCartIdQueryHandler(($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForCheckoutCompletedQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForCheckoutCompletedQueryHandler
     */
    protected function getGetPayPalOrderForCheckoutCompletedQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForCheckoutCompletedQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForCheckoutCompletedQueryHandler(($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForOrderConfirmationQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForOrderConfirmationQueryHandler
     */
    protected function getGetPayPalOrderForOrderConfirmationQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderForOrderConfirmationQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderForOrderConfirmationQueryHandler(($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderQueryHandler
     */
    protected function getGetPayPalOrderQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Order\\QueryHandler\\GetPayPalOrderQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\QueryHandler\GetPayPalOrderQueryHandler(($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] ?? $this->getPsCheckoutCartRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\PayPalConfiguration' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\PayPalConfiguration
     */
    protected function getPayPalConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\PayPalConfiguration(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCodeRepository'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCodeRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PayPalCodeRepository())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\PayPalOrderProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\PayPalOrderProvider
     */
    protected function getPayPalOrderProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalOrderProvider'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\PayPalOrderProvider(($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\PayPalPayLaterConfiguration' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\PayPalPayLaterConfiguration
     */
    protected function getPayPalPayLaterConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalPayLaterConfiguration'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\PayPalPayLaterConfiguration(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\CommandHandler\DeletePaymentTokenCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\CommandHandler\DeletePaymentTokenCommandHandler
     */
    protected function getDeletePaymentTokenCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\CommandHandler\\DeletePaymentTokenCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\CommandHandler\DeletePaymentTokenCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\PaymentMethodTokenService'] ?? $this->getPaymentMethodTokenServiceService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PaymentTokenRepository'] ?? $this->getPaymentTokenRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\CommandHandler\SavePaymentTokenCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\CommandHandler\SavePaymentTokenCommandHandler
     */
    protected function getSavePaymentTokenCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\CommandHandler\\SavePaymentTokenCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\CommandHandler\SavePaymentTokenCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PaymentTokenRepository'] ?? $this->getPaymentTokenRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\PaymentMethodTokenService' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\PaymentMethodTokenService
     */
    protected function getPaymentMethodTokenServiceService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\PaymentMethodTokenService'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\PaymentMethodTokenService(NULL, ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\CheckoutHttpClient'] ?? $this->getCheckoutHttpClientService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\Query\GetCustomerPaymentTokensQueryHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\Query\GetCustomerPaymentTokensQueryHandler
     */
    protected function getGetCustomerPaymentTokensQueryHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PaymentToken\\Query\\GetCustomerPaymentTokensQueryHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\PaymentToken\Query\GetCustomerPaymentTokensQueryHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PaymentTokenRepository'] ?? $this->getPaymentTokenRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Capture\CheckTransitionPayPalCaptureStatusService' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Capture\CheckTransitionPayPalCaptureStatusService
     */
    protected function getCheckTransitionPayPalCaptureStatusServiceService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Capture\\CheckTransitionPayPalCaptureStatusService'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Capture\CheckTransitionPayPalCaptureStatusService();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Capture\EventSubscriber\PayPalCaptureEventSubscriber' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Capture\EventSubscriber\PayPalCaptureEventSubscriber
     */
    protected function getPayPalCaptureEventSubscriberService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Capture\\EventSubscriber\\PayPalCaptureEventSubscriber'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Capture\EventSubscriber\PayPalCaptureEventSubscriber(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\Service\\CheckOrderAmount'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\Service\\CheckOrderAmount'] = new \PrestaShop\Module\PrestashopCheckout\Order\Service\CheckOrderAmount())), ($this->services['ps_checkout.cache.paypal.capture'] ?? $this->getPsCheckout_Cache_Paypal_CaptureService()), ($this->services['ps_checkout.cache.paypal.order'] ?? $this->getPsCheckout_Cache_Paypal_OrderService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Order\\State\\Service\\OrderStateMapper'] ?? $this->getOrderStateMapperService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Refund\CommandHandler\RefundPayPalCaptureCommandHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Refund\CommandHandler\RefundPayPalCaptureCommandHandler
     */
    protected function getRefundPayPalCaptureCommandHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Payment\\Refund\\CommandHandler\\RefundPayPalCaptureCommandHandler'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Payment\Refund\CommandHandler\RefundPayPalCaptureCommandHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\MaaslandHttpClient'] ?? $this->getMaaslandHttpClientService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Event\\SymfonyEventDispatcherAdapter'] ?? $this->getSymfonyEventDispatcherAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\PayPal\Sdk\PayPalSdkConfigurationBuilder' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Sdk\PayPalSdkConfigurationBuilder
     */
    protected function getPayPalSdkConfigurationBuilderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\Sdk\\PayPalSdkConfigurationBuilder'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Sdk\PayPalSdkConfigurationBuilder(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Environment\\Env'] ?? $this->getEnvService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalPayLaterConfiguration'] ?? $this->getPayPalPayLaterConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceConfigurationRepository'] ?? $this->getFundingSourceConfigurationRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ExpressCheckout\\ExpressCheckoutConfiguration'] ?? $this->getExpressCheckoutConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] ?? $this->getShopContextService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())), ($this->services['ps_checkout.logger'] ?? $this->getPsCheckout_LoggerService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceEligibilityConstraint'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceEligibilityConstraint'] = new \PrestaShop\Module\PrestashopCheckout\FundingSource\FundingSourceEligibilityConstraint())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\ConfigurationModule' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\ConfigurationModule
     */
    protected function getConfigurationModuleService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\ConfigurationModule'] = new \PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\ConfigurationModule(($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalPayLaterConfiguration'] ?? $this->getPayPalPayLaterConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ExpressCheckout\\ExpressCheckoutConfiguration'] ?? $this->getExpressCheckoutConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\FundingSource\\FundingSourceProvider'] ?? $this->getFundingSourceProviderService()), ($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\ContextModule' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\ContextModule
     */
    protected function getContextModuleService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\ContextModule'] = new \PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\ContextModule(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService())->name, ($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService())->module_key, ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\OnBoarding\\Step\\LiveStep'] ?? $this->getLiveStepService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\OnBoarding\\Step\\ValueBanner'] ?? $this->getValueBannerService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Translations\\Translations'] ?? $this->getTranslationsService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] ?? $this->getShopContextService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Shop\\ShopProvider'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Shop\\ShopProvider'] = new \PrestaShop\Module\PrestashopCheckout\Shop\ShopProvider())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Builder\\ModuleLink\\ModuleLinkBuilder'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Builder\\ModuleLink\\ModuleLinkBuilder'] = new \PrestaShop\Module\PrestashopCheckout\Builder\ModuleLink\ModuleLinkBuilder())), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsAccountRepository'] ?? $this->getPsAccountRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\PaypalModule' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\PaypalModule
     */
    protected function getPaypalModuleService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\PaypalModule'] = new \PrestaShop\Module\PrestashopCheckout\Presenter\Store\Modules\PaypalModule(($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Presenter\Store\StorePresenter' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Presenter\Store\StorePresenter
     */
    protected function getStorePresenterService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\StorePresenter'] = new \PrestaShop\Module\PrestashopCheckout\Presenter\Store\StorePresenter([0 => ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\ContextModule'] ?? $this->getContextModuleService()), 1 => ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\PaypalModule'] ?? $this->getPaypalModuleService()), 2 => ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Presenter\\Store\\Modules\\ConfigurationModule'] ?? $this->getConfigurationModuleService())]);
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Provider\PaymentMethodLogoProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Provider\PaymentMethodLogoProvider
     */
    protected function getPaymentMethodLogoProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Provider\\PaymentMethodLogoProvider'] = new \PrestaShop\Module\PrestashopCheckout\Provider\PaymentMethodLogoProvider(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Repository\CountryRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Repository\CountryRepository
     */
    protected function getCountryRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\CountryRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\CountryRepository();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Repository\PayPalCodeRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Repository\PayPalCodeRepository
     */
    protected function getPayPalCodeRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCodeRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PayPalCodeRepository();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Repository\PayPalCustomerRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Repository\PayPalCustomerRepository
     */
    protected function getPayPalCustomerRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalCustomerRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PayPalCustomerRepository(($this->services['ps_checkout.db'] ?? $this->getPsCheckout_DbService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Repository\PayPalOrderRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Repository\PayPalOrderRepository
     */
    protected function getPayPalOrderRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PayPalOrderRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PayPalOrderRepository(($this->services['ps_checkout.db'] ?? $this->getPsCheckout_DbService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Repository\PaymentTokenRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Repository\PaymentTokenRepository
     */
    protected function getPaymentTokenRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PaymentTokenRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PaymentTokenRepository(($this->services['ps_checkout.db'] ?? $this->getPsCheckout_DbService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Repository\PsAccountRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Repository\PsAccountRepository
     */
    protected function getPsAccountRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsAccountRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PsAccountRepository(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()), ($this->services['ps_accounts.facade'] ?? $this->getPsAccounts_FacadeService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Repository\PsCheckoutCartRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Repository\PsCheckoutCartRepository
     */
    protected function getPsCheckoutCartRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsCheckoutCartRepository'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PsCheckoutCartRepository(($this->services['ps_checkout.cache.pscheckoutcart'] ?? ($this->services['ps_checkout.cache.pscheckoutcart'] = new \Symfony\Component\Cache\Simple\ArrayCache())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Routing\Router' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Routing\Router
     */
    protected function getRouterService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Routing\\Router'] = new \PrestaShop\Module\PrestashopCheckout\Routing\Router();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\ShopContext' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\ShopContext
     */
    protected function getShopContextService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\ShopContext'] = new \PrestaShop\Module\PrestashopCheckout\ShopContext(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Environment\\Env'] ?? $this->getEnvService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Shop\ShopProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Shop\ShopProvider
     */
    protected function getShopProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Shop\\ShopProvider'] = new \PrestaShop\Module\PrestashopCheckout\Shop\ShopProvider();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\System\SystemConfiguration' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\System\SystemConfiguration
     */
    protected function getSystemConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\System\\SystemConfiguration'] = new \PrestaShop\Module\PrestashopCheckout\System\SystemConfiguration();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Translations\Translations' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Translations\Translations
     */
    protected function getTranslationsService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Translations\\Translations'] = new \PrestaShop\Module\PrestashopCheckout\Translations\Translations(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Validator\BatchConfigurationValidator' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Validator\BatchConfigurationValidator
     */
    protected function getBatchConfigurationValidatorService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Validator\\BatchConfigurationValidator'] = new \PrestaShop\Module\PrestashopCheckout\Validator\BatchConfigurationValidator();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Validator\FrontControllerValidator' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Validator\FrontControllerValidator
     */
    protected function getFrontControllerValidatorService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Validator\\FrontControllerValidator'] = new \PrestaShop\Module\PrestashopCheckout\Validator\FrontControllerValidator(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Validator\\MerchantValidator'] ?? $this->getMerchantValidatorService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\ExpressCheckout\\ExpressCheckoutConfiguration'] ?? $this->getExpressCheckoutConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalPayLaterConfiguration'] ?? $this->getPayPalPayLaterConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Validator\MerchantValidator' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Validator\MerchantValidator
     */
    protected function getMerchantValidatorService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Validator\\MerchantValidator'] = new \PrestaShop\Module\PrestashopCheckout\Validator\MerchantValidator(($this->services['PrestaShop\\Module\\PrestashopCheckout\\PayPal\\PayPalConfiguration'] ?? $this->getPayPalConfigurationService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Repository\\PsAccountRepository'] ?? $this->getPsAccountRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Context\\PrestaShopContext'] = new \PrestaShop\Module\PrestashopCheckout\Context\PrestaShopContext())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Webhook\WebhookEventConfigurationUpdatedHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Webhook\WebhookEventConfigurationUpdatedHandler
     */
    protected function getWebhookEventConfigurationUpdatedHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Webhook\\WebhookEventConfigurationUpdatedHandler'] = new \PrestaShop\Module\PrestashopCheckout\Webhook\WebhookEventConfigurationUpdatedHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Webhook\WebhookHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Webhook\WebhookHandler
     */
    protected function getWebhookHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Webhook\\WebhookHandler'] = new \PrestaShop\Module\PrestashopCheckout\Webhook\WebhookHandler(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Webhook\\WebhookSecretTokenService'] ?? $this->getWebhookSecretTokenServiceService()), [0 => ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Webhook\\WebhookEventConfigurationUpdatedHandler'] ?? $this->getWebhookEventConfigurationUpdatedHandlerService())]);
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopCheckout\Webhook\WebhookSecretTokenService' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Webhook\WebhookSecretTokenService
     */
    protected function getWebhookSecretTokenServiceService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopCheckout\\Webhook\\WebhookSecretTokenService'] = new \PrestaShop\Module\PrestashopCheckout\Webhook\WebhookSecretTokenService(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Configuration\\PrestaShopConfiguration'] ?? $this->getPrestaShopConfigurationService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\API\Client\FacebookCategoryClient' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\API\Client\FacebookCategoryClient
     */
    protected function getFacebookCategoryClientService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookCategoryClient'] = new \PrestaShop\Module\PrestashopFacebook\API\Client\FacebookCategoryClient(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Factory\\PsApiClientFactory'] ?? $this->getPsApiClientFactoryService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\GoogleCategoryRepository'] ?? $this->getGoogleCategoryRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\API\Client\FacebookClient' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\API\Client\FacebookClient
     */
    protected function getFacebookClientService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookClient'] = new \PrestaShop\Module\PrestashopFacebook\API\Client\FacebookClient(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Factory\\FacebookEssentialsApiClientFactory'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Factory\\FacebookEssentialsApiClientFactory'] = new \PrestaShop\Module\PrestashopFacebook\Factory\FacebookEssentialsApiClientFactory())), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\AccessTokenProvider'] ?? $this->getAccessTokenProviderService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\ConfigurationHandler'] ?? $this->getConfigurationHandlerService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\API\EventSubscriber\AccountSuspendedSubscriber' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\API\EventSubscriber\AccountSuspendedSubscriber
     */
    protected function getAccountSuspendedSubscriberService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\EventSubscriber\\AccountSuspendedSubscriber'] = new \PrestaShop\Module\PrestashopFacebook\API\EventSubscriber\AccountSuspendedSubscriber(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\API\EventSubscriber\ApiErrorSubscriber' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\API\EventSubscriber\ApiErrorSubscriber
     */
    protected function getApiErrorSubscriberService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\EventSubscriber\\ApiErrorSubscriber'] = new \PrestaShop\Module\PrestashopFacebook\API\EventSubscriber\ApiErrorSubscriber();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Adapter\ConfigurationAdapter' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Adapter\ConfigurationAdapter
     */
    protected function getConfigurationAdapterService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] = new \PrestaShop\Module\PrestashopFacebook\Adapter\ConfigurationAdapter(($this->services['ps_facebook.shop'] ?? $this->getPsFacebook_ShopService())->id);
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Adapter\ToolsAdapter' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Adapter\ToolsAdapter
     */
    protected function getToolsAdapterService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ToolsAdapter'] = new \PrestaShop\Module\PrestashopFacebook\Adapter\ToolsAdapter();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Buffer\TemplateBuffer' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Buffer\TemplateBuffer
     */
    protected function getTemplateBufferService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Buffer\\TemplateBuffer'] = new \PrestaShop\Module\PrestashopFacebook\Buffer\TemplateBuffer();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Config\Env' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Config\Env
     */
    protected function getEnv2Service()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Config\\Env'] = new \PrestaShop\Module\PrestashopFacebook\Config\Env();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Dispatcher\EventDispatcher' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Dispatcher\EventDispatcher
     */
    protected function getEventDispatcherService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Dispatcher\\EventDispatcher'] = new \PrestaShop\Module\PrestashopFacebook\Dispatcher\EventDispatcher(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\ApiConversionHandler'] ?? $this->getApiConversionHandlerService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\PixelHandler'] ?? $this->getPixelHandlerService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\EventDataProvider'] ?? $this->getEventDataProviderService()), ($this->services['ps_facebook.context'] ?? $this->getPsFacebook_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Factory\FacebookEssentialsApiClientFactory' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Factory\FacebookEssentialsApiClientFactory
     */
    protected function getFacebookEssentialsApiClientFactoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Factory\\FacebookEssentialsApiClientFactory'] = new \PrestaShop\Module\PrestashopFacebook\Factory\FacebookEssentialsApiClientFactory();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Factory\PsApiClientFactory' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Factory\PsApiClientFactory
     */
    protected function getPsApiClientFactoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Factory\\PsApiClientFactory'] = new \PrestaShop\Module\PrestashopFacebook\Factory\PsApiClientFactory(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Config\\Env'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Config\\Env'] = new \PrestaShop\Module\PrestashopFacebook\Config\Env())), ($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] ?? $this->getPsAccountsService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Handler\ApiConversionHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Handler\ApiConversionHandler
     */
    protected function getApiConversionHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\ApiConversionHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\ApiConversionHandler(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\ErrorHandler\\ErrorHandler'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\ErrorHandler\\ErrorHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\ErrorHandler\ErrorHandler())), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookClient'] ?? $this->getFacebookClientService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Handler\CategoryMatchHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Handler\CategoryMatchHandler
     */
    protected function getCategoryMatchHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\CategoryMatchHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\CategoryMatchHandler(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\GoogleCategoryRepository'] ?? $this->getGoogleCategoryRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Handler\ConfigurationHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Handler\ConfigurationHandler
     */
    protected function getConfigurationHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\ConfigurationHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\ConfigurationHandler(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Handler\ErrorHandler\ErrorHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Handler\ErrorHandler\ErrorHandler
     */
    protected function getErrorHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\ErrorHandler\\ErrorHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\ErrorHandler\ErrorHandler();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Handler\EventBusProductHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Handler\EventBusProductHandler
     */
    protected function getEventBusProductHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\EventBusProductHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\EventBusProductHandler(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ProductRepository'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ProductRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\ProductRepository())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Handler\MessengerHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Handler\MessengerHandler
     */
    protected function getMessengerHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\MessengerHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\MessengerHandler(($this->services['ps_facebook.language'] ?? $this->getPsFacebook_LanguageService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Config\\Env'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Config\\Env'] = new \PrestaShop\Module\PrestashopFacebook\Config\Env())));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Handler\PixelHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Handler\PixelHandler
     */
    protected function getPixelHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\PixelHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\PixelHandler(($this->services['ps_facebook'] ?? $this->getPsFacebookService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Handler\PrevalidationScanRefreshHandler' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Handler\PrevalidationScanRefreshHandler
     */
    protected function getPrevalidationScanRefreshHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Handler\\PrevalidationScanRefreshHandler'] = new \PrestaShop\Module\PrestashopFacebook\Handler\PrevalidationScanRefreshHandler(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\PrevalidationScanCacheProvider'] ?? $this->getPrevalidationScanCacheProviderService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ProductRepository'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ProductRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\ProductRepository())), ($this->services['ps_facebook.shop'] ?? $this->getPsFacebook_ShopService())->id);
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Manager\FbeFeatureManager' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Manager\FbeFeatureManager
     */
    protected function getFbeFeatureManagerService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Manager\\FbeFeatureManager'] = new \PrestaShop\Module\PrestashopFacebook\Manager\FbeFeatureManager(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookClient'] ?? $this->getFacebookClientService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Presenter\ModuleUpgradePresenter' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Presenter\ModuleUpgradePresenter
     */
    protected function getModuleUpgradePresenterService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Presenter\\ModuleUpgradePresenter'] = new \PrestaShop\Module\PrestashopFacebook\Presenter\ModuleUpgradePresenter(($this->services['ps_facebook.context'] ?? $this->getPsFacebook_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\AccessTokenProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\AccessTokenProvider
     */
    protected function getAccessTokenProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\AccessTokenProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\AccessTokenProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['ps_facebook.controller'] ?? $this->getPsFacebook_ControllerService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Factory\\PsApiClientFactory'] ?? $this->getPsApiClientFactoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\EventDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\EventDataProvider
     */
    protected function getEventDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\EventDataProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\EventDataProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ToolsAdapter'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ToolsAdapter'] = new \PrestaShop\Module\PrestashopFacebook\Adapter\ToolsAdapter())), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ProductRepository'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ProductRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\ProductRepository())), ($this->services['ps_facebook.context'] ?? $this->getPsFacebook_ContextService()), ($this->services['ps_facebook'] ?? $this->getPsFacebookService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\ProductAvailabilityProvider'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\ProductAvailabilityProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\ProductAvailabilityProvider())), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\GoogleCategoryRepository'] ?? $this->getGoogleCategoryRepositoryService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\GoogleCategoryProvider'] ?? $this->getGoogleCategoryProviderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\FacebookDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\FacebookDataProvider
     */
    protected function getFacebookDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\FacebookDataProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\FacebookDataProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookClient'] ?? $this->getFacebookClientService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\FbeDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\FbeDataProvider
     */
    protected function getFbeDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\FbeDataProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\FbeDataProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\FbeFeatureDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\FbeFeatureDataProvider
     */
    protected function getFbeFeatureDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\FbeFeatureDataProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\FbeFeatureDataProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\API\\Client\\FacebookClient'] ?? $this->getFacebookClientService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\GoogleCategoryProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\GoogleCategoryProvider
     */
    protected function getGoogleCategoryProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\GoogleCategoryProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\GoogleCategoryProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\GoogleCategoryRepository'] ?? $this->getGoogleCategoryRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\MultishopDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\MultishopDataProvider
     */
    protected function getMultishopDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\MultishopDataProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\MultishopDataProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ShopRepository'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ShopRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\ShopRepository())), ($this->services['PrestaShop\\Module\\Ps_facebook\\Tracker\\Segment'] ?? $this->getSegmentService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\PrevalidationScanCacheProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\PrevalidationScanCacheProvider
     */
    protected function getPrevalidationScanCacheProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\PrevalidationScanCacheProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\PrevalidationScanCacheProvider(($this->services['ps_facebook'] ?? $this->getPsFacebookService()), ($this->services['ps_facebook.cache'] ?? $this->getPsFacebook_CacheService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\PrevalidationScanDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\PrevalidationScanDataProvider
     */
    protected function getPrevalidationScanDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\PrevalidationScanDataProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\PrevalidationScanDataProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\PrevalidationScanCacheProvider'] ?? $this->getPrevalidationScanCacheProviderService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\ProductAvailabilityProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\ProductAvailabilityProvider
     */
    protected function getProductAvailabilityProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\ProductAvailabilityProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\ProductAvailabilityProvider();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Provider\ProductSyncReportProvider' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Provider\ProductSyncReportProvider
     */
    protected function getProductSyncReportProviderService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Provider\\ProductSyncReportProvider'] = new \PrestaShop\Module\PrestashopFacebook\Provider\ProductSyncReportProvider(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Factory\\PsApiClientFactory'] ?? $this->getPsApiClientFactoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Repository\GoogleCategoryRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Repository\GoogleCategoryRepository
     */
    protected function getGoogleCategoryRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\GoogleCategoryRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\GoogleCategoryRepository(($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Repository\ProductRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Repository\ProductRepository
     */
    protected function getProductRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ProductRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\ProductRepository();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Repository\ServerInformationRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Repository\ServerInformationRepository
     */
    protected function getServerInformationRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ServerInformationRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\ServerInformationRepository(($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] ?? $this->getPsAccountsService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Repository\ShopRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Repository\ShopRepository
     */
    protected function getShopRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\ShopRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\ShopRepository();
    }

    /**
     * Gets the public 'PrestaShop\Module\PrestashopFacebook\Repository\TabRepository' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Repository\TabRepository
     */
    protected function getTabRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PrestashopFacebook\\Repository\\TabRepository'] = new \PrestaShop\Module\PrestashopFacebook\Repository\TabRepository();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Presenter\PsAccountsPresenter' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Presenter\PsAccountsPresenter
     */
    protected function getPsAccountsPresenterService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter'] = \PrestaShop\Module\PsAccounts\ServiceProvider\StaticProvider::provide('PrestaShop\\Module\\PsAccounts\\Presenter\\PsAccountsPresenter');
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Repository\UserTokenRepository' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\UserTokenRepository
     */
    protected function getUserTokenRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Repository\\UserTokenRepository'] = \PrestaShop\Module\PsAccounts\ServiceProvider\StaticProvider::provide('PrestaShop\\Module\\PsAccounts\\Repository\\UserTokenRepository');
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\PsAccountsService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\PsAccountsService
     */
    protected function getPsAccountsServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService'] = \PrestaShop\Module\PsAccounts\ServiceProvider\StaticProvider::provide('PrestaShop\\Module\\PsAccounts\\Service\\PsAccountsService');
    }

    /**
     * Gets the public 'PrestaShop\Module\PsAccounts\Service\PsBillingService' shared service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\PsBillingService
     */
    protected function getPsBillingServiceService()
    {
        return $this->services['PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService'] = \PrestaShop\Module\PsAccounts\ServiceProvider\StaticProvider::provide('PrestaShop\\Module\\PsAccounts\\Service\\PsBillingService');
    }

    /**
     * Gets the public 'PrestaShop\Module\Ps_facebook\Tracker\Segment' shared service.
     *
     * @return \PrestaShop\Module\Ps_facebook\Tracker\Segment
     */
    protected function getSegmentService()
    {
        return $this->services['PrestaShop\\Module\\Ps_facebook\\Tracker\\Segment'] = new \PrestaShop\Module\Ps_facebook\Tracker\Segment(($this->services['ps_facebook.context'] ?? $this->getPsFacebook_ContextService()), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Config\\Env'] ?? ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Config\\Env'] = new \PrestaShop\Module\PrestashopFacebook\Config\Env())), ($this->services['PrestaShop\\Module\\PrestashopFacebook\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapterService()), ($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] ?? $this->getPsAccountsService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Controller\Admin\PsshippingCarrierController' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingCarrierController
     */
    protected function getPsshippingCarrierControllerService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingCarrierController'] = new \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingCarrierController(($this->services['psshipping'] ?? $this->getPsshippingService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Controller\Admin\PsshippingConfigurationController' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingConfigurationController
     */
    protected function getPsshippingConfigurationControllerService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingConfigurationController'] = new \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingConfigurationController(($this->services['psshipping'] ?? $this->getPsshippingService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Controller\Admin\PsshippingFaqController' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingFaqController
     */
    protected function getPsshippingFaqControllerService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingFaqController'] = new \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingFaqController(($this->services['psshipping'] ?? $this->getPsshippingService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Controller\Admin\PsshippingHomeController' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingHomeController
     */
    protected function getPsshippingHomeControllerService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingHomeController'] = new \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingHomeController(($this->services['psshipping'] ?? $this->getPsshippingService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Controller\Admin\PsshippingKeycloakAuthController' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingKeycloakAuthController
     */
    protected function getPsshippingKeycloakAuthControllerService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingKeycloakAuthController'] = new \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingKeycloakAuthController();
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Controller\Admin\PsshippingOrdersController' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingOrdersController
     */
    protected function getPsshippingOrdersControllerService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Controller\\Admin\\PsshippingOrdersController'] = new \PrestaShop\Module\Psshipping\Controller\Admin\PsshippingOrdersController(($this->services['psshipping'] ?? $this->getPsshippingService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Domain\Carriers\CarrierRepository' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Domain\Carriers\CarrierRepository
     */
    protected function getCarrierRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Domain\\Carriers\\CarrierRepository'] = new \PrestaShop\Module\Psshipping\Domain\Carriers\CarrierRepository(($this->services['psshipping'] ?? $this->getPsshippingService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Domain\Carriers\PickupCarrierConfiguration' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Domain\Carriers\PickupCarrierConfiguration
     */
    protected function getPickupCarrierConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Domain\\Carriers\\PickupCarrierConfiguration'] = new \PrestaShop\Module\Psshipping\Domain\Carriers\PickupCarrierConfiguration('prestashop.core.command_bus');
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Domain\Carriers\StandardCarrierConfiguration' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Domain\Carriers\StandardCarrierConfiguration
     */
    protected function getStandardCarrierConfigurationService()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Domain\\Carriers\\StandardCarrierConfiguration'] = new \PrestaShop\Module\Psshipping\Domain\Carriers\StandardCarrierConfiguration('prestashop.core.command_bus');
    }

    /**
     * Gets the public 'PrestaShop\Module\Psshipping\Handler\ErrorHandler' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Handler\ErrorHandler
     */
    protected function getErrorHandler2Service()
    {
        return $this->services['PrestaShop\\Module\\Psshipping\\Handler\\ErrorHandler'] = new \PrestaShop\Module\Psshipping\Handler\ErrorHandler();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Adapter\ConfigurationAdapter' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Adapter\ConfigurationAdapter
     */
    protected function getConfigurationAdapter2Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Adapter\\ConfigurationAdapter'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Adapter\ConfigurationAdapter(($this->services['psxmarketingwithgoogle.shop'] ?? $this->getPsxmarketingwithgoogle_ShopService())->id);
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Buffer\TemplateBuffer' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Buffer\TemplateBuffer
     */
    protected function getTemplateBuffer2Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Buffer\\TemplateBuffer'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Buffer\TemplateBuffer();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Config\Env' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Config\Env
     */
    protected function getEnv3Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Config\\Env'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Config\Env();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Conversion\EnhancedConversionToggle' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Conversion\EnhancedConversionToggle
     */
    protected function getEnhancedConversionToggleService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Conversion\\EnhancedConversionToggle'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Conversion\EnhancedConversionToggle(($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapter2Service()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Conversion\UserDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Conversion\UserDataProvider
     */
    protected function getUserDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Conversion\\UserDataProvider'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Conversion\UserDataProvider(($this->services['psxmarketingwithgoogle.customer'] ?? $this->getPsxmarketingwithgoogle_CustomerService()), ($this->services['psxmarketingwithgoogle.cart'] ?? $this->getPsxmarketingwithgoogle_CartService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Handler\ErrorHandler' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Handler\ErrorHandler
     */
    protected function getErrorHandler3Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Handler\\ErrorHandler'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Handler\ErrorHandler();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Handler\RemarketingHookHandler' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Handler\RemarketingHookHandler
     */
    protected function getRemarketingHookHandlerService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Handler\\RemarketingHookHandler'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Handler\RemarketingHookHandler(($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapter2Service()), ($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Buffer\\TemplateBuffer'] ?? ($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Buffer\\TemplateBuffer'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Buffer\TemplateBuffer())), ($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()), ($this->services['psxmarketingwithgoogle'] ?? $this->getPsxmarketingwithgoogleService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Provider\CartEventDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Provider\CartEventDataProvider
     */
    protected function getCartEventDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\CartEventDataProvider'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Provider\CartEventDataProvider(($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Provider\PageViewEventDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Provider\PageViewEventDataProvider
     */
    protected function getPageViewEventDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\PageViewEventDataProvider'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Provider\PageViewEventDataProvider(($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Provider\ProductDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Provider\ProductDataProvider
     */
    protected function getProductDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\ProductDataProvider'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Provider\ProductDataProvider(($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Provider\PurchaseEventDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Provider\PurchaseEventDataProvider
     */
    protected function getPurchaseEventDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\PurchaseEventDataProvider'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Provider\PurchaseEventDataProvider(($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\ProductDataProvider'] ?? $this->getProductDataProviderService()), ($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()), ($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapter2Service()), ($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\LanguageRepository'] ?? $this->getLanguageRepositoryService()), ($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CountryRepository'] ?? $this->getCountryRepository2Service()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Provider\VerificationTagDataProvider' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Provider\VerificationTagDataProvider
     */
    protected function getVerificationTagDataProviderService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Provider\\VerificationTagDataProvider'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Provider\VerificationTagDataProvider(($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapter2Service()), ($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\VerificationTagRepository'] ?? $this->getVerificationTagRepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\AttributesRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\AttributesRepository
     */
    protected function getAttributesRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\AttributesRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\AttributesRepository(($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\CarrierRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\CarrierRepository
     */
    protected function getCarrierRepository2Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CarrierRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\CarrierRepository();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\CategoryRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\CategoryRepository
     */
    protected function getCategoryRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CategoryRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\CategoryRepository(($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\CountryRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\CountryRepository
     */
    protected function getCountryRepository2Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CountryRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\CountryRepository(($this->services['psxmarketingwithgoogle.db'] ?? $this->getPsxmarketingwithgoogle_DbService()), ($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()), ($this->services['psxmarketingwithgoogle.country'] ?? $this->getPsxmarketingwithgoogle_CountryService()), ($this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Adapter\\ConfigurationAdapter'] ?? $this->getConfigurationAdapter2Service()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\CurrencyRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\CurrencyRepository
     */
    protected function getCurrencyRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\CurrencyRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\CurrencyRepository(($this->services['psxmarketingwithgoogle.currency'] ?? $this->getPsxmarketingwithgoogle_CurrencyService()), ($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\LanguageRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\LanguageRepository
     */
    protected function getLanguageRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\LanguageRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\LanguageRepository(($this->services['psxmarketingwithgoogle.shop'] ?? $this->getPsxmarketingwithgoogle_ShopService())->id);
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\ManufacturerRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\ManufacturerRepository
     */
    protected function getManufacturerRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\ManufacturerRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\ManufacturerRepository(($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\ProductRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\ProductRepository
     */
    protected function getProductRepository2Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\ProductRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\ProductRepository();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\StateRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\StateRepository
     */
    protected function getStateRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\StateRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\StateRepository(($this->services['psxmarketingwithgoogle.db'] ?? $this->getPsxmarketingwithgoogle_DbService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\TabRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\TabRepository
     */
    protected function getTabRepository2Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\TabRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\TabRepository();
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\TaxRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\TaxRepository
     */
    protected function getTaxRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\TaxRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\TaxRepository(($this->services['psxmarketingwithgoogle.db'] ?? $this->getPsxmarketingwithgoogle_DbService()), ($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Repository\VerificationTagRepository' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Repository\VerificationTagRepository
     */
    protected function getVerificationTagRepositoryService()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Repository\\VerificationTagRepository'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Repository\VerificationTagRepository(($this->services['psxmarketingwithgoogle.db'] ?? $this->getPsxmarketingwithgoogle_DbService()), ($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\Module\PsxMarketingWithGoogle\Tracker\Segment' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Tracker\Segment
     */
    protected function getSegment2Service()
    {
        return $this->services['PrestaShop\\Module\\PsxMarketingWithGoogle\\Tracker\\Segment'] = new \PrestaShop\Module\PsxMarketingWithGoogle\Tracker\Segment(($this->services['psxmarketingwithgoogle.context'] ?? $this->getPsxmarketingwithgoogle_ContextService()));
    }

    /**
     * Gets the public 'PrestaShop\PrestaShop\Adapter\Configuration' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Configuration
     */
    protected function getConfigurationService()
    {
        return $this->services['PrestaShop\\PrestaShop\\Adapter\\Configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration();
    }

    /**
     * Gets the public 'PrestaShop\PrestaShop\Adapter\ContextStateManager' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\ContextStateManager
     */
    protected function getContextStateManager2Service()
    {
        return $this->services['PrestaShop\\PrestaShop\\Adapter\\ContextStateManager'] = new \PrestaShop\PrestaShop\Adapter\ContextStateManager(($this->services['PrestaShop\\PrestaShop\\Adapter\\LegacyContext'] ?? $this->getLegacyContextService()));
    }

    /**
     * Gets the public 'PrestaShop\PrestaShop\Adapter\Currency\CurrencyDataProvider' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Currency\CurrencyDataProvider
     */
    protected function getCurrencyDataProviderService()
    {
        return $this->services['PrestaShop\\PrestaShop\\Adapter\\Currency\\CurrencyDataProvider'] = new \PrestaShop\PrestaShop\Adapter\Currency\CurrencyDataProvider(($this->services['PrestaShop\\PrestaShop\\Adapter\\Configuration'] ?? ($this->services['PrestaShop\\PrestaShop\\Adapter\\Configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration())), ((($this->services['PrestaShop\\PrestaShop\\Adapter\\LegacyContext'] ?? $this->getLegacyContextService())->getContext()->shop) ? (($this->services['PrestaShop\\PrestaShop\\Adapter\\LegacyContext'] ?? $this->getLegacyContextService())->getContext()->shop->id) : (null)));
    }

    /**
     * Gets the public 'PrestaShop\PrestaShop\Adapter\LegacyContext' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\LegacyContext
     */
    protected function getLegacyContextService()
    {
        return $this->services['PrestaShop\\PrestaShop\\Adapter\\LegacyContext'] = new \PrestaShop\PrestaShop\Adapter\LegacyContext('/mails/themes', ($this->services['PrestaShop\\PrestaShop\\Adapter\\Tools'] ?? ($this->services['PrestaShop\\PrestaShop\\Adapter\\Tools'] = new \PrestaShop\PrestaShop\Adapter\Tools())));
    }

    /**
     * Gets the public 'PrestaShop\PrestaShop\Adapter\Tools' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Tools
     */
    protected function getToolsService()
    {
        return $this->services['PrestaShop\\PrestaShop\\Adapter\\Tools'] = new \PrestaShop\PrestaShop\Adapter\Tools();
    }

    /**
     * Gets the public 'PrestaShop\PrestaShop\Core\Localization\Locale\Repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Locale\Repository
     */
    protected function getRepositoryService()
    {
        return $this->services['PrestaShop\\PrestaShop\\Core\\Localization\\Locale\\Repository'] = new \PrestaShop\PrestaShop\Core\Localization\Locale\Repository(($this->services['prestashop.core.localization.cldr.locale_repository'] ?? $this->getPrestashop_Core_Localization_Cldr_LocaleRepositoryService()), ($this->services['prestashop.core.localization.currency.repository'] ?? $this->getPrestashop_Core_Localization_Currency_RepositoryService()));
    }

    /**
     * Gets the public 'PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts' shared service.
     *
     * @return \PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts
     */
    protected function getPsAccountsService()
    {
        return $this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] = new \PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts(($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Installer'] ?? ($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Installer'] = new \PrestaShop\PsAccountsInstaller\Installer\Installer('3.0.0'))));
    }

    /**
     * Gets the public 'PrestaShop\PsAccountsInstaller\Installer\Installer' shared service.
     *
     * @return \PrestaShop\PsAccountsInstaller\Installer\Installer
     */
    protected function getInstallerService()
    {
        return $this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Installer'] = new \PrestaShop\PsAccountsInstaller\Installer\Installer('3.0.0');
    }

    /**
     * Gets the public 'annotation_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\AnnotationReader();
    }

    /**
     * Gets the public 'array' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getArrayService()
    {
        return $this->services['array'] = (new \PrestaShopBundle\DependencyInjection\CacheAdapterFactory())->getCacheAdapter('array');
    }

    /**
     * Gets the public 'configuration' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Configuration
     */
    protected function getConfiguration2Service()
    {
        return $this->services['configuration'] = new \PrestaShop\PrestaShop\Adapter\Configuration();
    }

    /**
     * Gets the public 'container.env_var_processors_locator' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function getContainer_EnvVarProcessorsLocatorService()
    {
        return $this->services['container.env_var_processors_locator'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'const' => ['privates', 'PrestaShopBundle\\DependencyInjection\\RuntimeConstEnvVarProcessor', 'getRuntimeConstEnvVarProcessorService', false],
        ], [
            'const' => '?',
        ]);
    }

    /**
     * Gets the public 'context' shared service.
     *
     * @return \Context
     */
    protected function getContextService()
    {
        return $this->services['context'] = \Context::getContext();
    }

    /**
     * Gets the public 'db' shared service.
     *
     * @return \Db
     */
    protected function getDbService()
    {
        return $this->services['db'] = \Db::getInstance();
    }

    /**
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], $this->parameters['doctrine.entity_managers'], 'default', 'default');
    }

    /**
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Configuration();
        $a->setSQLLogger(new \Doctrine\DBAL\Logging\LoggerChain([0 => new \Symfony\Bridge\Doctrine\Logger\DbalLogger(NULL, NULL), 1 => new \Doctrine\DBAL\Logging\DebugStack()]));

        return $this->services['doctrine.dbal.default_connection'] = (new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]))->createConnection(['driver' => 'pdo_mysql', 'host' => '127.0.0.1', 'port' => '', 'dbname' => 'ctinys', 'user' => 'root', 'password' => '', 'charset' => 'utf8mb4', 'driverOptions' => [1002 => 'SET sql_mode=(SELECT REPLACE(@@sql_mode,\'ONLY_FULL_GROUP_BY\',\'\'))', 1013 => $this->getEnv('const:runtime:_PS_ALLOW_MULTI_STATEMENTS_QUERIES_')], 'defaultTableOptions' => []], $a, new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this), ['enum' => 'string']);
    }

    /**
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService($lazyLoad = true)
    {
        $a = new \Doctrine\ORM\Configuration();

        $b = new \Doctrine\Persistence\Mapping\Driver\MappingDriverChain();

        $c = ($this->services['annotation_reader'] ?? ($this->services['annotation_reader'] = new \Doctrine\Common\Annotations\AnnotationReader()));
        $d = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($c, [0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\psxdesign\\src\\Entity']);
        $d->addExcludePaths([0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\psxdesign\\src\\Entity/index.php']);
        $e = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($c, [0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\ps_accounts\\src\\Entity']);
        $e->addExcludePaths([0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\ps_accounts\\src\\Entity/index.php']);
        $f = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($c, [0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\ps_checkout\\src\\Entity']);
        $f->addExcludePaths([0 => 'C:\\xampp\\htdocs\\ctinys\\modules\\ps_checkout\\src\\Entity/index.php']);

        $b->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($c, [0 => 'C:\\xampp\\htdocs\\ctinys\\src\\PrestaShopBundle\\Entity']), 'PrestaShop');
        $b->addDriver($d, 'PrestaShop\\Module\\PsxDesign\\Entity');
        $b->addDriver($e, 'PrestaShop\\Module\\PsAccounts\\Entity');
        $b->addDriver($f, 'PrestaShop\\Module\\PrestashopCheckout\\Entity');

        $a->setEntityNamespaces(['PrestaShopBundle\\Entity' => 'PrestaShop']);
        $a->setMetadataCache(new \Symfony\Component\Cache\Adapter\ArrayAdapter());
        $a->setQueryCache(new \Symfony\Component\Cache\Adapter\ArrayAdapter());
        $a->setResultCache(new \Symfony\Component\Cache\Adapter\ArrayAdapter());
        $a->setMetadataDriverImpl($b);
        $a->setProxyDir('C:\\xampp\\htdocs\\ctinys/var/cache/dev\\/doctrine/orm/Proxies');
        $a->setProxyNamespace('Proxies');
        $a->setAutoGenerateProxyClasses(true);
        $a->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $a->setNamingStrategy(($this->services['prestashop.database.naming_strategy'] ?? ($this->services['prestashop.database.naming_strategy'] = new \PrestaShopBundle\Service\Database\DoctrineNamingStrategy('ps_'))));
        $a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $a->setEntityListenerResolver(new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver($this));
        $a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new \Symfony\Component\DependencyInjection\ServiceLocator([])));
        $a->addCustomStringFunction('regexp', 'DoctrineExtensions\\Query\\Mysql\\Regexp');
        $a->addEntityNamespace('Modulepsxdesign', 'PrestaShop\\Module\\PsxDesign\\Entity');
        $a->addEntityNamespace('ModulepsAccounts', 'PrestaShop\\Module\\PsAccounts\\Entity');
        $a->addEntityNamespace('ModulepsCheckout', 'PrestaShop\\Module\\PrestashopCheckout\\Entity');

        $this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create(($this->services['doctrine.dbal.default_connection'] ?? $this->getDoctrine_Dbal_DefaultConnectionService()), $a);

        (new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'hashing' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Crypto\Hashing
     */
    protected function getHashingService()
    {
        return $this->services['hashing'] = new \PrestaShop\PrestaShop\Core\Crypto\Hashing();
    }

    /**
     * Gets the public 'klaviyops.klaviyo_api_wrapper' shared service.
     *
     * @return \KlaviyoPs\Classes\KlaviyoApiWrapper
     */
    protected function getKlaviyops_KlaviyoApiWrapperService()
    {
        return $this->services['klaviyops.klaviyo_api_wrapper'] = new \KlaviyoPs\Classes\KlaviyoApiWrapper();
    }

    /**
     * Gets the public 'klaviyops.klaviyo_service.coupon_generator' shared service.
     *
     * @return \KlaviyoPs\Classes\KlaviyoServices\CouponGeneratorService
     */
    protected function getKlaviyops_KlaviyoService_CouponGeneratorService()
    {
        return $this->services['klaviyops.klaviyo_service.coupon_generator'] = new \KlaviyoPs\Classes\KlaviyoServices\CouponGeneratorService(($this->services['klaviyops.prestashop_services.cart_rule'] ?? ($this->services['klaviyops.prestashop_services.cart_rule'] = new \KlaviyoPs\Classes\PrestashopServices\CartRuleService())));
    }

    /**
     * Gets the public 'klaviyops.klaviyo_service.customer_event_service' shared service.
     *
     * @return \KlaviyoPs\Classes\KlaviyoServices\CustomerEventService
     */
    protected function getKlaviyops_KlaviyoService_CustomerEventServiceService()
    {
        return $this->services['klaviyops.klaviyo_service.customer_event_service'] = new \KlaviyoPs\Classes\KlaviyoServices\CustomerEventService(($this->services['klaviyops.prestashop_services.datetime'] ?? ($this->services['klaviyops.prestashop_services.datetime'] = new \KlaviyoPs\Classes\PrestashopServices\DateTimeService())), ($this->services['klaviyops.prestashop_services.context'] ?? $this->getKlaviyops_PrestashopServices_ContextService()), ($this->services['klaviyops.prestashop_services.customer'] ?? $this->getKlaviyops_PrestashopServices_CustomerService()));
    }

    /**
     * Gets the public 'klaviyops.klaviyo_service.order_event' shared service.
     *
     * @return \KlaviyoPs\Classes\KlaviyoServices\OrderEventService
     */
    protected function getKlaviyops_KlaviyoService_OrderEventService()
    {
        return $this->services['klaviyops.klaviyo_service.order_event'] = new \KlaviyoPs\Classes\KlaviyoServices\OrderEventService(($this->services['klaviyops.klaviyo_api_wrapper'] ?? ($this->services['klaviyops.klaviyo_api_wrapper'] = new \KlaviyoPs\Classes\KlaviyoApiWrapper())), ($this->services['klaviyops.prestashop_services.order'] ?? $this->getKlaviyops_PrestashopServices_OrderService()), ($this->services['klaviyops.prestashop_services.product'] ?? ($this->services['klaviyops.prestashop_services.product'] = new \KlaviyoPs\Classes\PrestashopServices\ProductService())), ($this->services['klaviyops.klaviyo_service.customer_event_service'] ?? $this->getKlaviyops_KlaviyoService_CustomerEventServiceService()));
    }

    /**
     * Gets the public 'klaviyops.klaviyo_service.profile_event' shared service.
     *
     * @return \KlaviyoPs\Classes\KlaviyoServices\ProfileEventService
     */
    protected function getKlaviyops_KlaviyoService_ProfileEventService()
    {
        return $this->services['klaviyops.klaviyo_service.profile_event'] = new \KlaviyoPs\Classes\KlaviyoServices\ProfileEventService(($this->services['klaviyops.klaviyo_api_wrapper'] ?? ($this->services['klaviyops.klaviyo_api_wrapper'] = new \KlaviyoPs\Classes\KlaviyoApiWrapper())), ($this->services['klaviyops.klaviyo_service.customer_event_service'] ?? $this->getKlaviyops_KlaviyoService_CustomerEventServiceService()));
    }

    /**
     * Gets the public 'klaviyops.module' shared service.
     *
     * @return \KlaviyoPsModule
     */
    protected function getKlaviyops_ModuleService()
    {
        return $this->services['klaviyops.module'] = \KlaviyoPsModule::getInstance();
    }

    /**
     * Gets the public 'klaviyops.prestashop_components.context' shared service.
     *
     * @return \Context
     */
    protected function getKlaviyops_PrestashopComponents_ContextService()
    {
        return $this->services['klaviyops.prestashop_components.context'] = \Context::getContext();
    }

    /**
     * Gets the public 'klaviyops.prestashop_services.cart_rule' shared service.
     *
     * @return \KlaviyoPs\Classes\PrestashopServices\CartRuleService
     */
    protected function getKlaviyops_PrestashopServices_CartRuleService()
    {
        return $this->services['klaviyops.prestashop_services.cart_rule'] = new \KlaviyoPs\Classes\PrestashopServices\CartRuleService();
    }

    /**
     * Gets the public 'klaviyops.prestashop_services.context' shared service.
     *
     * @return \KlaviyoPs\Classes\PrestashopServices\ContextService
     */
    protected function getKlaviyops_PrestashopServices_ContextService()
    {
        return $this->services['klaviyops.prestashop_services.context'] = new \KlaviyoPs\Classes\PrestashopServices\ContextService(($this->services['klaviyops.prestashop_components.context'] ?? $this->getKlaviyops_PrestashopComponents_ContextService()));
    }

    /**
     * Gets the public 'klaviyops.prestashop_services.customer' shared service.
     *
     * @return \KlaviyoPs\Classes\PrestashopServices\CustomerService
     */
    protected function getKlaviyops_PrestashopServices_CustomerService()
    {
        return $this->services['klaviyops.prestashop_services.customer'] = new \KlaviyoPs\Classes\PrestashopServices\CustomerService(($this->services['klaviyops.prestashop_services.validate'] ?? ($this->services['klaviyops.prestashop_services.validate'] = new \KlaviyoPs\Classes\PrestashopServices\ValidateService())), ($this->services['klaviyops.prestashop_services.datetime'] ?? ($this->services['klaviyops.prestashop_services.datetime'] = new \KlaviyoPs\Classes\PrestashopServices\DateTimeService())), ($this->services['klaviyops.prestashop_services.context'] ?? $this->getKlaviyops_PrestashopServices_ContextService()));
    }

    /**
     * Gets the public 'klaviyops.prestashop_services.datetime' shared service.
     *
     * @return \KlaviyoPs\Classes\PrestashopServices\DateTimeService
     */
    protected function getKlaviyops_PrestashopServices_DatetimeService()
    {
        return $this->services['klaviyops.prestashop_services.datetime'] = new \KlaviyoPs\Classes\PrestashopServices\DateTimeService();
    }

    /**
     * Gets the public 'klaviyops.prestashop_services.logger' shared service.
     *
     * @return \KlaviyoPs\Classes\PrestashopServices\LoggerService
     */
    protected function getKlaviyops_PrestashopServices_LoggerService()
    {
        return $this->services['klaviyops.prestashop_services.logger'] = new \KlaviyoPs\Classes\PrestashopServices\LoggerService();
    }

    /**
     * Gets the public 'klaviyops.prestashop_services.order' shared service.
     *
     * @return \KlaviyoPs\Classes\PrestashopServices\OrderService
     */
    protected function getKlaviyops_PrestashopServices_OrderService()
    {
        return $this->services['klaviyops.prestashop_services.order'] = new \KlaviyoPs\Classes\PrestashopServices\OrderService(($this->services['klaviyops.prestashop_services.context'] ?? $this->getKlaviyops_PrestashopServices_ContextService()), ($this->services['klaviyops.prestashop_services.product'] ?? ($this->services['klaviyops.prestashop_services.product'] = new \KlaviyoPs\Classes\PrestashopServices\ProductService())), ($this->services['klaviyops.prestashop_services.customer'] ?? $this->getKlaviyops_PrestashopServices_CustomerService()));
    }

    /**
     * Gets the public 'klaviyops.prestashop_services.product' shared service.
     *
     * @return \KlaviyoPs\Classes\PrestashopServices\ProductService
     */
    protected function getKlaviyops_PrestashopServices_ProductService()
    {
        return $this->services['klaviyops.prestashop_services.product'] = new \KlaviyoPs\Classes\PrestashopServices\ProductService();
    }

    /**
     * Gets the public 'klaviyops.prestashop_services.validate' shared service.
     *
     * @return \KlaviyoPs\Classes\PrestashopServices\ValidateService
     */
    protected function getKlaviyops_PrestashopServices_ValidateService()
    {
        return $this->services['klaviyops.prestashop_services.validate'] = new \KlaviyoPs\Classes\PrestashopServices\ValidateService();
    }

    /**
     * Gets the public 'klaviyops.util_services.csv' shared service.
     *
     * @return \KlaviyoPs\Classes\UtilServices\CsvService
     */
    protected function getKlaviyops_UtilServices_CsvService()
    {
        return $this->services['klaviyops.util_services.csv'] = new \KlaviyoPs\Classes\UtilServices\CsvService();
    }

    /**
     * Gets the public 'klaviyops.util_services.env' shared service.
     *
     * @return \KlaviyoPs\Classes\UtilServices\EnvService
     */
    protected function getKlaviyops_UtilServices_EnvService()
    {
        return $this->services['klaviyops.util_services.env'] = new \KlaviyoPs\Classes\UtilServices\EnvService(($this->services['klaviyops.module'] ?? $this->getKlaviyops_ModuleService()));
    }

    /**
     * Gets the public 'prestashop.adapter.data_provider.country' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Country\CountryDataProvider
     */
    protected function getPrestashop_Adapter_DataProvider_CountryService()
    {
        return $this->services['prestashop.adapter.data_provider.country'] = new \PrestaShop\PrestaShop\Adapter\Country\CountryDataProvider();
    }

    /**
     * Gets the public 'prestashop.adapter.environment' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Environment
     */
    protected function getPrestashop_Adapter_EnvironmentService()
    {
        return $this->services['prestashop.adapter.environment'] = new \PrestaShop\PrestaShop\Adapter\Environment(true);
    }

    /**
     * Gets the public 'prestashop.adapter.module.repository.module_repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Module\Repository\ModuleRepository
     */
    protected function getPrestashop_Adapter_Module_Repository_ModuleRepositoryService()
    {
        return $this->services['prestashop.adapter.module.repository.module_repository'] = new \PrestaShop\PrestaShop\Adapter\Module\Repository\ModuleRepository('C:\\xampp\\htdocs\\ctinys', 'C:\\xampp\\htdocs\\ctinys/modules/');
    }

    /**
     * Gets the public 'prestashop.adapter.validate' shared service.
     *
     * @return \PrestaShop\PrestaShop\Adapter\Validate
     */
    protected function getPrestashop_Adapter_ValidateService()
    {
        return $this->services['prestashop.adapter.validate'] = new \PrestaShop\PrestaShop\Adapter\Validate();
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.advanced_factory' shared service.
     *
     * @return \PrestaShop\CircuitBreaker\AdvancedCircuitBreakerFactory
     */
    protected function getPrestashop_Core_CircuitBreaker_AdvancedFactoryService()
    {
        return $this->services['prestashop.core.circuit_breaker.advanced_factory'] = new \PrestaShop\CircuitBreaker\AdvancedCircuitBreakerFactory();
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.cache' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\FilesystemAdapter
     */
    protected function getPrestashop_Core_CircuitBreaker_CacheService()
    {
        return $this->services['prestashop.core.circuit_breaker.cache'] = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('', 0, (($this->services['prestashop.adapter.environment'] ?? ($this->services['prestashop.adapter.environment'] = new \PrestaShop\PrestaShop\Adapter\Environment(true)))->getCacheDir() . "/circuit_breaker"));
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.doctrine_cache' shared service.
     *
     * @return \Symfony\Component\Cache\DoctrineProvider
     */
    protected function getPrestashop_Core_CircuitBreaker_DoctrineCacheService()
    {
        return $this->services['prestashop.core.circuit_breaker.doctrine_cache'] = new \Symfony\Component\Cache\DoctrineProvider(($this->services['prestashop.core.circuit_breaker.cache'] ?? $this->getPrestashop_Core_CircuitBreaker_CacheService()));
    }

    /**
     * Gets the public 'prestashop.core.circuit_breaker.storage' shared service.
     *
     * @return \PrestaShop\CircuitBreaker\Storage\DoctrineCache
     */
    protected function getPrestashop_Core_CircuitBreaker_StorageService()
    {
        return $this->services['prestashop.core.circuit_breaker.storage'] = new \PrestaShop\CircuitBreaker\Storage\DoctrineCache(($this->services['prestashop.core.circuit_breaker.doctrine_cache'] ?? $this->getPrestashop_Core_CircuitBreaker_DoctrineCacheService()));
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.cart' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\CartFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_CartService()
    {
        return $this->services['prestashop.core.filter.front_end_object.cart'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\CartFilter(($this->services['prestashop.core.filter.front_end_object.product_collection'] ?? $this->getPrestashop_Core_Filter_FrontEndObject_ProductCollectionService()));
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.configuration' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ConfigurationFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_ConfigurationService()
    {
        return $this->services['prestashop.core.filter.front_end_object.configuration'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ConfigurationFilter();
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.customer' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\CustomerFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_CustomerService()
    {
        return $this->services['prestashop.core.filter.front_end_object.customer'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\CustomerFilter();
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.main' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\MainFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_MainService()
    {
        return $this->services['prestashop.core.filter.front_end_object.main'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\MainFilter(['cart' => ($this->services['prestashop.core.filter.front_end_object.cart'] ?? $this->getPrestashop_Core_Filter_FrontEndObject_CartService()), 'customer' => ($this->services['prestashop.core.filter.front_end_object.customer'] ?? ($this->services['prestashop.core.filter.front_end_object.customer'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\CustomerFilter())), 'shop' => ($this->services['prestashop.core.filter.front_end_object.shop'] ?? ($this->services['prestashop.core.filter.front_end_object.shop'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ShopFilter())), 'configuration' => ($this->services['prestashop.core.filter.front_end_object.configuration'] ?? ($this->services['prestashop.core.filter.front_end_object.configuration'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ConfigurationFilter()))]);
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.product' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ProductFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_ProductService()
    {
        return $this->services['prestashop.core.filter.front_end_object.product'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ProductFilter();
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.product_collection' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\CollectionFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_ProductCollectionService()
    {
        $this->services['prestashop.core.filter.front_end_object.product_collection'] = $instance = new \PrestaShop\PrestaShop\Core\Filter\CollectionFilter();

        $instance->queue([0 => ($this->services['prestashop.core.filter.front_end_object.product'] ?? ($this->services['prestashop.core.filter.front_end_object.product'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ProductFilter()))]);

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.search_result_product' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\SearchResultProductFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_SearchResultProductService()
    {
        return $this->services['prestashop.core.filter.front_end_object.search_result_product'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\SearchResultProductFilter();
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.search_result_product_collection' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\CollectionFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_SearchResultProductCollectionService()
    {
        $this->services['prestashop.core.filter.front_end_object.search_result_product_collection'] = $instance = new \PrestaShop\PrestaShop\Core\Filter\CollectionFilter();

        $instance->queue([0 => ($this->services['prestashop.core.filter.front_end_object.search_result_product'] ?? ($this->services['prestashop.core.filter.front_end_object.search_result_product'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\SearchResultProductFilter()))]);

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.filter.front_end_object.shop' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ShopFilter
     */
    protected function getPrestashop_Core_Filter_FrontEndObject_ShopService()
    {
        return $this->services['prestashop.core.filter.front_end_object.shop'] = new \PrestaShop\PrestaShop\Core\Filter\FrontEndObject\ShopFilter();
    }

    /**
     * Gets the public 'prestashop.core.localization.cache.adapter' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\ArrayAdapter
     */
    protected function getPrestashop_Core_Localization_Cache_AdapterService()
    {
        return $this->services['prestashop.core.localization.cache.adapter'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter();
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.cache.adapter' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\FilesystemAdapter
     */
    protected function getPrestashop_Core_Localization_Cldr_Cache_AdapterService()
    {
        return $this->services['prestashop.core.localization.cldr.cache.adapter'] = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('CLDR', 0, 'C:\\xampp\\htdocs\\ctinys/var/cache/dev\\/localization');
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.datalayer.locale_cache' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\DataLayer\LocaleCache
     */
    protected function getPrestashop_Core_Localization_Cldr_Datalayer_LocaleCacheService()
    {
        $this->services['prestashop.core.localization.cldr.datalayer.locale_cache'] = $instance = new \PrestaShop\PrestaShop\Core\Localization\CLDR\DataLayer\LocaleCache(($this->services['prestashop.core.localization.cldr.cache.adapter'] ?? ($this->services['prestashop.core.localization.cldr.cache.adapter'] = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('CLDR', 0, 'C:\\xampp\\htdocs\\ctinys/var/cache/dev\\/localization'))));

        $instance->setLowerLayer(($this->services['prestashop.core.localization.cldr.datalayer.locale_reference'] ?? $this->getPrestashop_Core_Localization_Cldr_Datalayer_LocaleReferenceService()));

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.datalayer.locale_reference' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\DataLayer\LocaleReference
     */
    protected function getPrestashop_Core_Localization_Cldr_Datalayer_LocaleReferenceService()
    {
        return $this->services['prestashop.core.localization.cldr.datalayer.locale_reference'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\DataLayer\LocaleReference(($this->services['prestashop.core.localization.cldr.reader'] ?? ($this->services['prestashop.core.localization.cldr.reader'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\Reader())));
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.locale_data_source' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\LocaleDataSource
     */
    protected function getPrestashop_Core_Localization_Cldr_LocaleDataSourceService()
    {
        return $this->services['prestashop.core.localization.cldr.locale_data_source'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\LocaleDataSource(($this->services['prestashop.core.localization.cldr.datalayer.locale_cache'] ?? $this->getPrestashop_Core_Localization_Cldr_Datalayer_LocaleCacheService()));
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.locale_repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\LocaleRepository
     */
    protected function getPrestashop_Core_Localization_Cldr_LocaleRepositoryService()
    {
        return $this->services['prestashop.core.localization.cldr.locale_repository'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\LocaleRepository(($this->services['prestashop.core.localization.cldr.locale_data_source'] ?? $this->getPrestashop_Core_Localization_Cldr_LocaleDataSourceService()));
    }

    /**
     * Gets the public 'prestashop.core.localization.cldr.reader' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\CLDR\Reader
     */
    protected function getPrestashop_Core_Localization_Cldr_ReaderService()
    {
        return $this->services['prestashop.core.localization.cldr.reader'] = new \PrestaShop\PrestaShop\Core\Localization\CLDR\Reader();
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.datasource' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\CurrencyDataSource
     */
    protected function getPrestashop_Core_Localization_Currency_DatasourceService()
    {
        return $this->services['prestashop.core.localization.currency.datasource'] = new \PrestaShop\PrestaShop\Core\Localization\Currency\CurrencyDataSource(($this->services['prestashop.core.localization.currency.middleware.cache'] ?? $this->getPrestashop_Core_Localization_Currency_Middleware_CacheService()), ($this->services['prestashop.core.localization.currency.middleware.installed'] ?? $this->getPrestashop_Core_Localization_Currency_Middleware_InstalledService()));
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.middleware.cache' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyCache
     */
    protected function getPrestashop_Core_Localization_Currency_Middleware_CacheService()
    {
        $this->services['prestashop.core.localization.currency.middleware.cache'] = $instance = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyCache(($this->services['prestashop.core.localization.cache.adapter'] ?? ($this->services['prestashop.core.localization.cache.adapter'] = new \Symfony\Component\Cache\Adapter\ArrayAdapter())));

        $instance->setLowerLayer(($this->services['prestashop.core.localization.currency.middleware.database'] ?? $this->getPrestashop_Core_Localization_Currency_Middleware_DatabaseService()));

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.middleware.database' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyDatabase
     */
    protected function getPrestashop_Core_Localization_Currency_Middleware_DatabaseService()
    {
        $this->services['prestashop.core.localization.currency.middleware.database'] = $instance = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyDatabase(($this->services['PrestaShop\\PrestaShop\\Adapter\\Currency\\CurrencyDataProvider'] ?? $this->getCurrencyDataProviderService()));

        $instance->setLowerLayer(($this->services['prestashop.core.localization.currency.middleware.reference'] ?? $this->getPrestashop_Core_Localization_Currency_Middleware_ReferenceService()));

        return $instance;
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.middleware.installed' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyInstalled
     */
    protected function getPrestashop_Core_Localization_Currency_Middleware_InstalledService()
    {
        return $this->services['prestashop.core.localization.currency.middleware.installed'] = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyInstalled(($this->services['PrestaShop\\PrestaShop\\Adapter\\Currency\\CurrencyDataProvider'] ?? $this->getCurrencyDataProviderService()));
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.middleware.reference' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyReference
     */
    protected function getPrestashop_Core_Localization_Currency_Middleware_ReferenceService()
    {
        return $this->services['prestashop.core.localization.currency.middleware.reference'] = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyReference(($this->services['prestashop.core.localization.cldr.locale_repository'] ?? $this->getPrestashop_Core_Localization_Cldr_LocaleRepositoryService()));
    }

    /**
     * Gets the public 'prestashop.core.localization.currency.repository' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Currency\Repository
     */
    protected function getPrestashop_Core_Localization_Currency_RepositoryService()
    {
        return $this->services['prestashop.core.localization.currency.repository'] = new \PrestaShop\PrestaShop\Core\Localization\Currency\Repository(($this->services['prestashop.core.localization.currency.datasource'] ?? $this->getPrestashop_Core_Localization_Currency_DatasourceService()));
    }

    /**
     * Gets the public 'prestashop.core.localization.locale.context_locale' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\Localization\Locale
     */
    protected function getPrestashop_Core_Localization_Locale_ContextLocaleService()
    {
        return $this->services['prestashop.core.localization.locale.context_locale'] = ($this->services['PrestaShop\\PrestaShop\\Core\\Localization\\Locale\\Repository'] ?? $this->getRepositoryService())->getLocale(($this->services['PrestaShop\\PrestaShop\\Adapter\\LegacyContext'] ?? $this->getLegacyContextService())->getContext()->language->getLocale());
    }

    /**
     * Gets the public 'prestashop.core.string.character_cleaner' shared service.
     *
     * @return \PrestaShop\PrestaShop\Core\String\CharacterCleaner
     *
     * @deprecated The "prestashop.core.string.character_cleaner" service is deprecated. You should stop using it, as it will be removed in the future.
     */
    protected function getPrestashop_Core_String_CharacterCleanerService()
    {
        @trigger_error('The "prestashop.core.string.character_cleaner" service is deprecated. You should stop using it, as it will be removed in the future.', E_USER_DEPRECATED);

        return $this->services['prestashop.core.string.character_cleaner'] = new \PrestaShop\PrestaShop\Core\String\CharacterCleaner();
    }

    /**
     * Gets the public 'prestashop.database.naming_strategy' shared service.
     *
     * @return \PrestaShopBundle\Service\Database\DoctrineNamingStrategy
     */
    protected function getPrestashop_Database_NamingStrategyService()
    {
        return $this->services['prestashop.database.naming_strategy'] = new \PrestaShopBundle\Service\Database\DoctrineNamingStrategy('ps_');
    }

    /**
     * Gets the public 'prestashop.translation.translator_language_loader' shared service.
     *
     * @return \PrestaShopBundle\Translation\TranslatorLanguageLoader
     */
    protected function getPrestashop_Translation_TranslatorLanguageLoaderService()
    {
        return $this->services['prestashop.translation.translator_language_loader'] = new \PrestaShopBundle\Translation\TranslatorLanguageLoader(($this->services['prestashop.adapter.module.repository.module_repository'] ?? ($this->services['prestashop.adapter.module.repository.module_repository'] = new \PrestaShop\PrestaShop\Adapter\Module\Repository\ModuleRepository('C:\\xampp\\htdocs\\ctinys', 'C:\\xampp\\htdocs\\ctinys/modules/'))));
    }

    /**
     * Gets the public 'ps_accounts.facade' shared service.
     *
     * @return \PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts
     */
    protected function getPsAccounts_FacadeService()
    {
        return $this->services['ps_accounts.facade'] = new \PrestaShop\PsAccountsInstaller\Installer\Facade\PsAccounts(($this->services['ps_accounts.installer'] ?? ($this->services['ps_accounts.installer'] = new \PrestaShop\PsAccountsInstaller\Installer\Installer('4.0.0'))));
    }

    /**
     * Gets the public 'ps_accounts.installer' shared service.
     *
     * @return \PrestaShop\PsAccountsInstaller\Installer\Installer
     */
    protected function getPsAccounts_InstallerService()
    {
        return $this->services['ps_accounts.installer'] = new \PrestaShop\PsAccountsInstaller\Installer\Installer('4.0.0');
    }

    /**
     * Gets the public 'ps_checkout.bus.command' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\CommandBus\TacticianCommandBusAdapter
     */
    protected function getPsCheckout_Bus_CommandService()
    {
        return $this->services['ps_checkout.bus.command'] = new \PrestaShop\Module\PrestashopCheckout\CommandBus\TacticianCommandBusAdapter(($this->services['PrestaShop\\Module\\PrestashopCheckout\\CommandBus\\TacticianCommandBusFactory'] ?? $this->getTacticianCommandBusFactoryService())->create());
    }

    /**
     * Gets the public 'ps_checkout.cache.order' shared service.
     *
     * @return \Symfony\Component\Cache\Simple\ArrayCache
     */
    protected function getPsCheckout_Cache_OrderService()
    {
        return $this->services['ps_checkout.cache.order'] = new \Symfony\Component\Cache\Simple\ArrayCache();
    }

    /**
     * Gets the public 'ps_checkout.cache.paypal.capture' shared service.
     *
     * @return \Symfony\Component\Cache\Simple\ChainCache
     */
    protected function getPsCheckout_Cache_Paypal_CaptureService()
    {
        return $this->services['ps_checkout.cache.paypal.capture'] = new \Symfony\Component\Cache\Simple\ChainCache([0 => new \Symfony\Component\Cache\Simple\ArrayCache(), 1 => new \Symfony\Component\Cache\Simple\FilesystemCache('paypal-capture', 3600, ($this->services['PrestaShop\\ModuleLibCacheDirectoryProvider\\Cache\\CacheDirectoryProvider'] ?? ($this->services['PrestaShop\\ModuleLibCacheDirectoryProvider\\Cache\\CacheDirectoryProvider'] = new \PrestaShop\ModuleLibCacheDirectoryProvider\Cache\CacheDirectoryProvider('8.2.0', 'C:\\xampp\\htdocs\\ctinys', true)))->getPath())]);
    }

    /**
     * Gets the public 'ps_checkout.cache.paypal.order' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\PayPal\Order\Cache\PayPalOrderCache
     */
    protected function getPsCheckout_Cache_Paypal_OrderService()
    {
        return $this->services['ps_checkout.cache.paypal.order'] = new \PrestaShop\Module\PrestashopCheckout\PayPal\Order\Cache\PayPalOrderCache([0 => new \Symfony\Component\Cache\Simple\ArrayCache(), 1 => new \Symfony\Component\Cache\Simple\FilesystemCache('paypal-orders', 3600, ($this->services['PrestaShop\\ModuleLibCacheDirectoryProvider\\Cache\\CacheDirectoryProvider'] ?? ($this->services['PrestaShop\\ModuleLibCacheDirectoryProvider\\Cache\\CacheDirectoryProvider'] = new \PrestaShop\ModuleLibCacheDirectoryProvider\Cache\CacheDirectoryProvider('8.2.0', 'C:\\xampp\\htdocs\\ctinys', true)))->getPath())]);
    }

    /**
     * Gets the public 'ps_checkout.cache.pscheckoutcart' shared service.
     *
     * @return \Symfony\Component\Cache\Simple\ArrayCache
     */
    protected function getPsCheckout_Cache_PscheckoutcartService()
    {
        return $this->services['ps_checkout.cache.pscheckoutcart'] = new \Symfony\Component\Cache\Simple\ArrayCache();
    }

    /**
     * Gets the public 'ps_checkout.db' shared service.
     *
     * @return \Db
     */
    protected function getPsCheckout_DbService()
    {
        return $this->services['ps_checkout.db'] = \Db::getInstance();
    }

    /**
     * Gets the public 'ps_checkout.http.client' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Http\HttpClientInterface
     */
    protected function getPsCheckout_Http_ClientService()
    {
        return $this->services['ps_checkout.http.client'] = ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\HttpClientFactory'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Http\\HttpClientFactory'] = new \PrestaShop\Module\PrestashopCheckout\Http\HttpClientFactory()))->create(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Builder\\Configuration\\MaaslandHttpClientConfigurationBuilder'] ?? $this->getMaaslandHttpClientConfigurationBuilderService()));
    }

    /**
     * Gets the public 'ps_checkout.logger' shared service.
     *
     * @return \Psr\Log\LoggerInterface
     */
    protected function getPsCheckout_LoggerService()
    {
        return $this->services['ps_checkout.logger'] = ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerFactory'] ?? $this->getLoggerFactoryService())->build(($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerDirectory'] ?? ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerDirectory'] = new \PrestaShop\Module\PrestashopCheckout\Logger\LoggerDirectory('8.2.0', 'C:\\xampp\\htdocs\\ctinys'))));
    }

    /**
     * Gets the public 'ps_checkout.logger.handler' shared service.
     *
     * @return \Monolog\Handler\HandlerInterface
     */
    protected function getPsCheckout_Logger_HandlerService()
    {
        return $this->services['ps_checkout.logger.handler'] = ($this->services['PrestaShop\\Module\\PrestashopCheckout\\Logger\\LoggerHandlerFactory'] ?? $this->getLoggerHandlerFactoryService())->build();
    }

    /**
     * Gets the public 'ps_checkout.module' shared service.
     *
     * @return \Ps_checkout
     */
    protected function getPsCheckout_ModuleService()
    {
        return $this->services['ps_checkout.module'] = \Module::getInstanceByName('ps_checkout');
    }

    /**
     * Gets the public 'ps_checkout.module.version' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Version\Version
     */
    protected function getPsCheckout_Module_VersionService()
    {
        return $this->services['ps_checkout.module.version'] = \PrestaShop\Module\PrestashopCheckout\Version\Version::buildFromString(($this->services['ps_checkout.module'] ?? $this->getPsCheckout_ModuleService())->version);
    }

    /**
     * Gets the public 'ps_checkout.repository.paypal.code' shared service.
     *
     * @return \PrestaShop\Module\PrestashopCheckout\Repository\PayPalCodeRepository
     */
    protected function getPsCheckout_Repository_Paypal_CodeService()
    {
        return $this->services['ps_checkout.repository.paypal.code'] = new \PrestaShop\Module\PrestashopCheckout\Repository\PayPalCodeRepository();
    }

    /**
     * Gets the public 'ps_facebook' shared service.
     *
     * @return \Ps_facebook
     */
    protected function getPsFacebookService()
    {
        return $this->services['ps_facebook'] = \Module::getInstanceByName('ps_facebook');
    }

    /**
     * Gets the public 'ps_facebook.billing_env' shared service.
     *
     * @return \PrestaShop\Module\PrestashopFacebook\Factory\ParametersFactory
     */
    protected function getPsFacebook_BillingEnvService()
    {
        return $this->services['ps_facebook.billing_env'] = \PrestaShop\Module\PrestashopFacebook\Factory\ParametersFactory::getBillingEnv();
    }

    /**
     * Gets the public 'ps_facebook.cache' shared service.
     *
     * @return \string
     */
    protected function getPsFacebook_CacheService()
    {
        return $this->services['ps_facebook.cache'] = \PrestaShop\Module\PrestashopFacebook\Factory\CacheFactory::getCachePath();
    }

    /**
     * Gets the public 'ps_facebook.context' shared service.
     *
     * @return \Context
     */
    protected function getPsFacebook_ContextService()
    {
        return $this->services['ps_facebook.context'] = \PrestaShop\Module\PrestashopFacebook\Factory\ContextFactory::getContext();
    }

    /**
     * Gets the public 'ps_facebook.controller' shared service.
     *
     * @return \Controller
     */
    protected function getPsFacebook_ControllerService()
    {
        return $this->services['ps_facebook.controller'] = \PrestaShop\Module\PrestashopFacebook\Factory\ContextFactory::getController();
    }

    /**
     * Gets the public 'ps_facebook.cookie' shared service.
     *
     * @return \Cookie
     */
    protected function getPsFacebook_CookieService()
    {
        return $this->services['ps_facebook.cookie'] = \PrestaShop\Module\PrestashopFacebook\Factory\ContextFactory::getCookie();
    }

    /**
     * Gets the public 'ps_facebook.currency' shared service.
     *
     * @return \Currency
     */
    protected function getPsFacebook_CurrencyService()
    {
        return $this->services['ps_facebook.currency'] = \PrestaShop\Module\PrestashopFacebook\Factory\ContextFactory::getCurrency();
    }

    /**
     * Gets the public 'ps_facebook.language' shared service.
     *
     * @return \Language
     */
    protected function getPsFacebook_LanguageService()
    {
        return $this->services['ps_facebook.language'] = \PrestaShop\Module\PrestashopFacebook\Factory\ContextFactory::getLanguage();
    }

    /**
     * Gets the public 'ps_facebook.link' shared service.
     *
     * @return \Shop
     */
    protected function getPsFacebook_LinkService()
    {
        return $this->services['ps_facebook.link'] = \PrestaShop\Module\PrestashopFacebook\Factory\ContextFactory::getLink();
    }

    /**
     * Gets the public 'ps_facebook.shop' shared service.
     *
     * @return \Shop
     */
    protected function getPsFacebook_ShopService()
    {
        return $this->services['ps_facebook.shop'] = \PrestaShop\Module\PrestashopFacebook\Factory\ContextFactory::getShop();
    }

    /**
     * Gets the public 'ps_facebook.smarty' shared service.
     *
     * @return \Smarty
     */
    protected function getPsFacebook_SmartyService()
    {
        return $this->services['ps_facebook.smarty'] = \PrestaShop\Module\PrestashopFacebook\Factory\ContextFactory::getSmarty();
    }

    /**
     * Gets the public 'psshipping' shared service.
     *
     * @return \Psshipping
     */
    protected function getPsshippingService()
    {
        return $this->services['psshipping'] = \Module::getInstanceByName('psshipping');
    }

    /**
     * Gets the public 'psshipping.context' shared service.
     *
     * @return \Context
     */
    protected function getPsshipping_ContextService()
    {
        return $this->services['psshipping.context'] = \Context::getContext();
    }

    /**
     * Gets the public 'psshipping.helper.config' shared service.
     *
     * @return \PrestaShop\Module\Psshipping\Helper\ConfigHelper
     */
    protected function getPsshipping_Helper_ConfigService()
    {
        return $this->services['psshipping.helper.config'] = new \PrestaShop\Module\Psshipping\Helper\ConfigHelper('https://shipping-api.prestashop.com', 'https://assets.prestashop3.com/shipping', 0, 0, 'https://www.mbe.it/en/tracking?c=@', '3XsHeI2dfKoKE2wReGp7IO2bLa5hbeVB', 'https://78c41abf489931010a3a83cacc14926b@o298402.ingest.sentry.io/4505906299600896', 'production');
    }

    /**
     * Gets the public 'psshipping.ps_billings_context_wrapper' shared service.
     *
     * @return \PrestaShopCorp\Billing\Wrappers\BillingContextWrapper
     */
    protected function getPsshipping_PsBillingsContextWrapperService()
    {
        return $this->services['psshipping.ps_billings_context_wrapper'] = new \PrestaShopCorp\Billing\Wrappers\BillingContextWrapper(($this->services['ps_accounts.facade'] ?? $this->getPsAccounts_FacadeService()), ($this->services['psshipping.context'] ?? $this->getPsshipping_ContextService()), 0);
    }

    /**
     * Gets the public 'psshipping.ps_billings_facade' shared service.
     *
     * @return \PrestaShopCorp\Billing\Presenter\BillingPresenter
     */
    protected function getPsshipping_PsBillingsFacadeService()
    {
        return $this->services['psshipping.ps_billings_facade'] = new \PrestaShopCorp\Billing\Presenter\BillingPresenter(($this->services['psshipping.ps_billings_context_wrapper'] ?? $this->getPsshipping_PsBillingsContextWrapperService()), ($this->services['psshipping'] ?? $this->getPsshippingService()));
    }

    /**
     * Gets the public 'psshipping.ps_billings_service' shared service.
     *
     * @return \PrestaShopCorp\Billing\Services\BillingService
     */
    protected function getPsshipping_PsBillingsServiceService()
    {
        return $this->services['psshipping.ps_billings_service'] = new \PrestaShopCorp\Billing\Services\BillingService(($this->services['psshipping.ps_billings_context_wrapper'] ?? $this->getPsshipping_PsBillingsContextWrapperService()), ($this->services['psshipping'] ?? $this->getPsshippingService()));
    }

    /**
     * Gets the public 'psxmarketingwithgoogle' shared service.
     *
     * @return \PsxMarketingWithGoogle
     */
    protected function getPsxmarketingwithgoogleService()
    {
        return $this->services['psxmarketingwithgoogle'] = \Module::getInstanceByName('psxmarketingwithgoogle');
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.billing_env' shared service.
     *
     * @return \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ParametersFactory
     */
    protected function getPsxmarketingwithgoogle_BillingEnvService()
    {
        return $this->services['psxmarketingwithgoogle.billing_env'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ParametersFactory::getBillingEnv();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.cart' shared service.
     *
     * @return \Currency
     */
    protected function getPsxmarketingwithgoogle_CartService()
    {
        return $this->services['psxmarketingwithgoogle.cart'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getCart();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.context' shared service.
     *
     * @return \Context
     */
    protected function getPsxmarketingwithgoogle_ContextService()
    {
        return $this->services['psxmarketingwithgoogle.context'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getContext();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.controller' shared service.
     *
     * @return \Controller
     */
    protected function getPsxmarketingwithgoogle_ControllerService()
    {
        return $this->services['psxmarketingwithgoogle.controller'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getController();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.cookie' shared service.
     *
     * @return \Cookie
     */
    protected function getPsxmarketingwithgoogle_CookieService()
    {
        return $this->services['psxmarketingwithgoogle.cookie'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getCookie();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.country' shared service.
     *
     * @return \Country
     */
    protected function getPsxmarketingwithgoogle_CountryService()
    {
        return $this->services['psxmarketingwithgoogle.country'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getCountry();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.currency' shared service.
     *
     * @return \Currency
     */
    protected function getPsxmarketingwithgoogle_CurrencyService()
    {
        return $this->services['psxmarketingwithgoogle.currency'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getCurrency();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.customer' shared service.
     *
     * @return \Currency
     */
    protected function getPsxmarketingwithgoogle_CustomerService()
    {
        return $this->services['psxmarketingwithgoogle.customer'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getCustomer();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.db' shared service.
     *
     * @return \Db
     */
    protected function getPsxmarketingwithgoogle_DbService()
    {
        return $this->services['psxmarketingwithgoogle.db'] = \Db::getInstance();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.language' shared service.
     *
     * @return \Language
     */
    protected function getPsxmarketingwithgoogle_LanguageService()
    {
        return $this->services['psxmarketingwithgoogle.language'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getLanguage();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.link' shared service.
     *
     * @return \Shop
     */
    protected function getPsxmarketingwithgoogle_LinkService()
    {
        return $this->services['psxmarketingwithgoogle.link'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getLink();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.shop' shared service.
     *
     * @return \Shop
     */
    protected function getPsxmarketingwithgoogle_ShopService()
    {
        return $this->services['psxmarketingwithgoogle.shop'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getShop();
    }

    /**
     * Gets the public 'psxmarketingwithgoogle.smarty' shared service.
     *
     * @return \Smarty
     */
    protected function getPsxmarketingwithgoogle_SmartyService()
    {
        return $this->services['psxmarketingwithgoogle.smarty'] = \PrestaShop\Module\PsxMarketingWithGoogle\Factory\ContextFactory::getSmarty();
    }

    /**
     * Gets the private 'PrestaShopBundle\DependencyInjection\RuntimeConstEnvVarProcessor' shared service.
     *
     * @return \PrestaShopBundle\DependencyInjection\RuntimeConstEnvVarProcessor
     */
    protected function getRuntimeConstEnvVarProcessorService()
    {
        return $this->privates['PrestaShopBundle\\DependencyInjection\\RuntimeConstEnvVarProcessor'] = new \PrestaShopBundle\DependencyInjection\RuntimeConstEnvVarProcessor();
    }

    /**
     * Gets the private 'PrestaShopCorp\Billing\Wrappers\BillingContextWrapper' shared service.
     *
     * @return \PrestaShopCorp\Billing\Wrappers\BillingContextWrapper
     */
    protected function getBillingContextWrapperService()
    {
        return $this->privates['PrestaShopCorp\\Billing\\Wrappers\\BillingContextWrapper'] = new \PrestaShopCorp\Billing\Wrappers\BillingContextWrapper(($this->services['PrestaShop\\PsAccountsInstaller\\Installer\\Facade\\PsAccounts'] ?? $this->getPsAccountsService()), ($this->services['ps_facebook.context'] ?? $this->getPsFacebook_ContextService()), ($this->services['ps_facebook.billing_env'] ?? $this->getPsFacebook_BillingEnvService()));
    }

    /**
     * Gets the public 'prestashop.adapter.tools' alias.
     *
     * @return object The "PrestaShop\PrestaShop\Adapter\Tools" service.
     */
    protected function getPrestashop_Adapter_ToolsService()
    {
        @trigger_error('The "prestashop.adapter.tools" service alias is deprecated. You should stop using it, as it will be removed in the future.', E_USER_DEPRECATED);

        return $this->get('PrestaShop\\PrestaShop\\Adapter\\Tools');
    }

    /**
     * @return array|bool|float|int|string|\UnitEnum|null
     */
    public function getParameter($name)
    {
        $name = (string) $name;

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name): bool
    {
        $name = (string) $name;

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value): void
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag(): ParameterBagInterface
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    private function getDynamicParameter(string $name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    protected function getDefaultParameters(): array
    {
        return [
            'database_host' => '127.0.0.1',
            'database_port' => '',
            'database_name' => 'ctinys',
            'database_user' => 'root',
            'database_password' => '',
            'database_prefix' => 'ps_',
            'database_engine' => 'InnoDB',
            'mailer_transport' => 'smtp',
            'mailer_host' => '127.0.0.1',
            'mailer_user' => NULL,
            'mailer_password' => NULL,
            'secret' => 'kD9quv6Yvr1DeSvGcgVFxdF9krVMm4hypRegnyv6BosPRp9jjBiwED3FNyTBZqQM',
            'ps_caching' => 'CacheMemcache',
            'ps_cache_enable' => false,
            'ps_creation_date' => '2025-09-01',
            'locale' => 'es-ES',
            'use_debug_toolbar' => true,
            'cookie_key' => '56t1eWBwowXWakze6wqzYhDI4MG7SbXjOCB1iaWFjstScu93UBAE68tvjPCTtdfJ',
            'cookie_iv' => 'Y6gqZaIsWMXIA9Q3jZNSRZGM3IEcXvF2',
            'new_cookie_key' => 'def000008425d90319b2537a5c0c834983360eec186b450533244af6df6b01f0b890a2821c81dab69065922996082c8bb7c28638575fc7a1d3d7fd116c17f86e03bc9d22',
            'api_public_key' => '-----BEGIN PUBLIC KEY-----'."\n".'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA13Xav/21YruFeJQUtKhe'."\n".'vabOfk/FvAyQ7j0/Fo9E9E9WImpB/7QXkSSB907ljQZYynGkvzMjj2N9eIpLt68F'."\n".'2ybvLy6UPI5hAY79iWe4TXZbfOihTol1XSuZaTH9aplKIIUD5XOu33MD1UeMccT1'."\n".'+6kkmOgrw/s/fKEEq/BHuZ2qwrliC/QZNd/ZNfzt50XHkgF4iwFfHxdm0AMy7fUf'."\n".'VvCF04o0c6dDne+YPwBlX1BcxDhxpp8jmKQIo2Pp4p4PEdOyLIEDy5LU09cTdfub'."\n".'1MpPeY9ZjbS/rHRBl5IhfoR5B4XPDexFij+7GXD/nlnaIgiL4RZyqgjvI3GWV7OF'."\n".'sQIDAQAB'."\n".'-----END PUBLIC KEY-----'."\n".'',
            'api_private_key' => '-----BEGIN PRIVATE KEY-----'."\n".'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDXddq//bViu4V4'."\n".'lBS0qF69ps5+T8W8DJDuPT8Wj0T0T1YiakH/tBeRJIH3TuWNBljKcaS/MyOPY314'."\n".'iku3rwXbJu8vLpQ8jmEBjv2JZ7hNdlt86KFOiXVdK5lpMf1qmUoghQPlc67fcwPV'."\n".'R4xxxPX7qSSY6CvD+z98oQSr8Ee5narCuWIL9Bk139k1/O3nRceSAXiLAV8fF2bQ'."\n".'AzLt9R9W8IXTijRzp0Od75g/AGVfUFzEOHGmnyOYpAijY+ning8R07IsgQPLktTT'."\n".'1xN1+5vUyk95j1mNtL+sdEGXkiF+hHkHhc8N7EWKP7sZcP+eWdoiCIvhFnKqCO8j'."\n".'cZZXs4WxAgMBAAECggEAA/H0f2910sj8OKj9eBFdKrvTLBzp0feo77PPY+pbqN2L'."\n".'BjZL3xK9G7s/Zffb3CkxlwNdsOKO1CFOOtbNbB+YS9r6pjKEJFe3DwA/RDTR+xkf'."\n".'s7nOulFqBLq3pGV17m3AHbhRyfHEUfMZLt6Qg8THfEQsl2Ao7P28u9t26m8L4Sop'."\n".'RyK50soHz7c62F9/pH81DpzJI0m+n7HANWTWB6P2CJV7WtqY1GNpReLmQrkp13NH'."\n".'KpSAZC76pV999ZCA6oSS4XNniHOYZKQXB6mj6f5R57bkwd36Qi621SjUpTXt1GIE'."\n".'YF1DuQZ2aRLk+S37Xmu0+vQhu21ZiKDY1mYYG7MowQKBgQDbCJ3AUXxNN+UAEhjq'."\n".'AInNTO9W6QMqDBHijLT3B8UtvFMC/xw43IUTpbERsuTXo2Fezu3VXt0G4FJv6D2j'."\n".'OyTVqM6MyzdlAQO51eJshE6Kt5wkBThvbbj1N6+7HZXLIkzt8/JgDkOtDQaRuSLu'."\n".'K8/jtUyfPZKClgDI/elXCneOdwKBgQD70tqS5gTlODYJAvbJBbMc3kcXYIZVMalg'."\n".'mvngfafoGd2GK+gTsz3+MxZjNuWsUrwWTvZZkvxjeLdJJUpwrSEIVpzUWBY9dfnX'."\n".'oacWzxDtsX1t2if0VK7GN2ZGCoDPClRlBZKPykkkiOQ+sZgw71Kfq6S88jfJQZqc'."\n".'EUe2YrlPFwKBgGQbZwYb+ATO1BIZM1vXzSOQ0x7UtoaEJ7R0fM0etwb1OLd442w1'."\n".'lXjqVKhzK9ZGrN0JFHhduAVJh0PwUCOHh4lDcsu0oWe/c/V+hNL2EXOjAXERFb8P'."\n".'1eX1gpKxreG+lox230L5ogK4nlUB2a4jRgubtB5fpNOcPVWffwMyHHx3AoGBAJNP'."\n".'+7EnggGdam7HHxrljKv8k9XnD25TCOSMhFSA7XJnfyF4GeE8X62OsTAE80Jle8YJ'."\n".'Fy+7Po3qFj5h5DQZ81LvZ/sINKprk2ZDGH3NT/fcdqWGkwzpZPxreBbNGiEDx+74'."\n".'3Y3kJfmLYwoR1hf6SHlDbbFieKPxDsLxkOPuyLytAoGAGjAIzKJZo969McwDOrbR'."\n".'o4Jd9n1vdJgc47a/aRkgrlguJXqv6zfk2hjkd7fEaimIMuDOR6vnmPON4RUUCcMQ'."\n".'5IPUfAqzPoL/qiubS8z4hly2dj6M312+lZ7V+Bcn+6UGpgoYhSCYfuMdRzAqiWKS'."\n".'sir5hjBPboDGprc2f32VXEY='."\n".'-----END PRIVATE KEY-----'."\n".'',
            'cache.driver' => 'array',
            'cache.adapter' => 'cache.adapter.array',
            'kernel.bundles' => [

            ],
            'kernel.root_dir' => 'C:\\xampp\\htdocs\\ctinys/app',
            'kernel.project_dir' => 'C:\\xampp\\htdocs\\ctinys',
            'kernel.name' => 'app',
            'kernel.debug' => true,
            'kernel.environment' => 'dev',
            'kernel.cache_dir' => 'C:\\xampp\\htdocs\\ctinys/var/cache/dev\\',
            'kernel.active_modules' => [
                0 => 'ps_linklist',
                1 => 'blockreassurance',
                2 => 'psgdpr',
                3 => 'ps_contactinfo',
                4 => 'ps_languageselector',
                5 => 'ps_currencyselector',
                6 => 'ps_customersignin',
                7 => 'ps_shoppingcart',
                8 => 'ps_mainmenu',
                9 => 'ps_searchbar',
                10 => 'ps_imageslider',
                11 => 'ps_featuredproducts',
                12 => 'ps_banner',
                13 => 'ps_customtext',
                14 => 'ps_specials',
                15 => 'ps_newproducts',
                16 => 'ps_bestsellers',
                17 => 'ps_emailsubscription',
                18 => 'ps_socialfollow',
                19 => 'ps_customeraccountlinks',
                20 => 'ps_categorytree',
                21 => 'ps_facetedsearch',
                22 => 'contactform',
                23 => 'ps_sharebuttons',
                24 => 'pagesnotfound',
                25 => 'statsbestproducts',
                26 => 'statsstock',
                27 => 'statsforecast',
                28 => 'klaviyopsautomation',
                29 => 'ps_crossselling',
                30 => 'statsbestcategories',
                31 => 'dashgoals',
                32 => 'psshipping',
                33 => 'gamification',
                34 => 'statssales',
                35 => 'statsbestmanufacturers',
                36 => 'ps_accounts',
                37 => 'ps_mbo',
                38 => 'psxmarketingwithgoogle',
                39 => 'ps_dataprivacy',
                40 => 'ps_emailalerts',
                41 => 'ps_googleanalytics',
                42 => 'statscheckup',
                43 => 'ps_supplierlist',
                44 => 'dashtrends',
                45 => 'ps_facebook',
                46 => 'statsproduct',
                47 => 'ps_checkout',
                48 => 'gridhtml',
                49 => 'ps_themecusto',
                50 => 'statsbestsuppliers',
                51 => 'gsitemap',
                52 => 'psxdesign',
                53 => 'ps_metrics',
                54 => 'statsbestcustomers',
                55 => 'ps_brandlist',
                56 => 'statsnewsletter',
                57 => 'ps_viewedproduct',
                58 => 'ps_eventbus',
                59 => 'ps_distributionapiclient',
                60 => 'ps_categoryproducts',
                61 => 'statsregistrations',
                62 => 'dashproducts',
                63 => 'statscatalog',
                64 => 'statsdata',
                65 => 'ps_faviconnotificationbo',
                66 => 'ps_edition_basic',
                67 => 'dashactivity',
                68 => 'statspersonalinfos',
                69 => 'graphnvd3',
                70 => 'statsbestvouchers',
                71 => 'statscarrier',
                72 => 'statssearch',
                73 => 'cards_home',
                74 => 'faqs',
                75 => 'ps_customtext2',
                76 => 'clicktopay',
                77 => 'redsyspur',
                78 => 'blockwishlist',
            ],
            'ps_cache_dir' => 'C:\\xampp\\htdocs\\ctinys/var/cache/dev\\',
            'mail_themes_uri' => '/mails/themes',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => [
                'default' => 'doctrine.orm.default_entity_manager',
            ],
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => [

            ],
            'doctrine.connections' => [
                'default' => 'doctrine.dbal.default_connection',
            ],
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.metadata.attribute.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AttributeDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ContainerEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.proxy_dir' => 'C:\\xampp\\htdocs\\ctinys/var/cache/dev\\/doctrine/orm/Proxies',
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'psshipping.sentry_dsn' => 'https://78c41abf489931010a3a83cacc14926b@o298402.ingest.sentry.io/4505906299600896',
            'psshipping.sentry_env' => 'production',
            'psshipping.ps_billing_sandbox' => 0,
            'psshipping.vue_app_dev_mode' => 0,
            'psshipping.cdn_url' => 'https://assets.prestashop3.com/shipping',
            'psshipping.api_url' => 'https://shipping-api.prestashop.com',
            'psshipping.cloudsync_cdc_url' => 'https://assets.prestashop3.com/ext/cloudsync-merchant-sync-consent/latest/cloudsync-cdc.js',
            'psshipping.use_local_vue_app' => 0,
            'psshipping.mbe_tracking_url' => 'https://www.mbe.it/en/tracking?c=@',
            'psshipping.segment_key' => '3XsHeI2dfKoKE2wReGp7IO2bLa5hbeVB',
        ];
    }
}
