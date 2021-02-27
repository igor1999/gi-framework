**Introduction.**

Framework GI is designed to create all possible variations of PHP-applications. It can be used to create a complex module-based 
application and also a microservice. It can also process both web-server and Command Line Interface (CLI) requests.

**Advantages.**

High level of structured code. The entire code is divided into small, maximally independent elements with a clear purpose.

Flexibility. Thanks to the use of DI-containers, any entity - class instance or resource - can be redefined anywhere 
in the project.

High level of use of already written code. In particular, the component structure of the application and the use 
of DOM-classes allows you to use the already written components in any new usecase, or create new components 
by inheriting or composing existing ones.

**Application life cycle.**

The GI-application life cycle is based on Call-Objects. A Call-Object is an object designed to handle a specific user request. 
This means that, for each such request, a specific Call-Object is created.

Thus, the life cycle of application in GI is the following...

...The application gets a list of Call-Objects, by some means or other, depending on the type of application.

...The application sequentially calls its method handle() for each Call-Object.

...With the method handle() Call-Object, it is initially determined, using the special Route-Object, whether it is selected 
(i.e. whether it matches the user request). And if so, then...

...The Call-Object encapsulates all input data - Request, Command Line Arguments and so on ...; performs a number of other 
operations necessary for the application to function effectively (creates the current DI-container, for example);

...The Call-Object sequentially executes the chain of closures (handlers), as an argument, and passes itself to them.

...The Call-Object intended for web-application has the object Response. If, after all handlers have been completely executed, 
Response is set, it is dispatched to client with the method Response::dispatch().

...The method handle() of Call-Object returns the bool value, depending on whether the given Call-Object is selected. If method handle() 
of next Call-Object returns true, the application stops.

...If the application does not find the selected Call-Object, it reports that the Call was not found. For a web application, 
this message returns a 404 page to the client.

Using Call-Objects, you can efficiently implement pattern Middleware. For example, if you need to insert a certain handler 
into the chain, a new Call-class is created, in the constructor of which this handler is added to the chain. And then, if necessary, 
instances of this new Call-class are used.

**GI project architecture.**

The architecture of the microservice project is not initially defined and is determined directly by the developer.

A module-based project includes three kinds of file system objects (directories):

... As a matter of fact, the framework is in the GI directory.

... Modules. Created by the developer. The number of modules in the project is not limited. In general, the framework can, 
in some cases, be interpreted as a special module.

... Bootstrap directory. Includes one or two entry points to the application, depending on whether the project uses a call 
to the application through the web server, through the CLI, or both.

The location of the above-mentioned directories in the file system is arbitrary and is determined by the developer himself.

**Resource loading.**

There are two kinds of resources of framework:

...Files with PHP-classes. In the framework itself, they are named according to the PSR-4 standard.

...Others: phtml-templates, css, java-scripts, images, i18n files, logs, etc...

PHP-classes are loaded either by the built-in autoloader of the framework, or by the composer.

According to the GI ideology, any resource that is not a PHP class must be bound to a PHP class. For example, phtml-templates are bound 
to Markup Renderers classes, i18n files to Glossaries classes, etc...

The path to such a resource is found using a PHP class, and most frequently, using the exact class with which it is associated. 
This means, as the base directory for a given resource, you can specify the name of the class, and then GI will consider 
the base directory where the file with this class is located. This approach relieves the developer of the need to specifically 
remember file paths.

**Service-locators.**

The GI framework has a service-locator - an object that encapsulates the most commonly used services, for example. 
These include DI-container, standard component factory, validator factory, standard language translation, current request, etc…

The service locator is a singleton and connects to application classes by means of a trait. A lot of service locator methods are called 
directly via the methods of this trait.

According to the GI ideology, a trait with a framework locator service must be connected to every class used in a GI application. 
Therefore, if a developer creates his own class that does not inherit from any framework class, then the trait of the locator service 
must be used in such a class.

Each application module can also have its own service locator, created on the same principles as the service locator of the framework.

**DI-container.**

The DI-container is available through the framework's service locator and contains interface mapping to specific instantiated classes. 
As additional information, you can specify the class or class hierarchy for which this dependency applies, and also whether 
the created instance should be cached.

By default, the DI-container is empty. At the same time, you can bind your own DI-container to any Call-Object. 
In a module-based project, a DI-container can be attached to a module, and then all Call-Objects of this module will install 
the given DI-container into the service locator of the framework (if the current Call-Object does not have its own DI-container, 
of course).

All new instances in a GI application, with the exception of a few base classes, must be created through the DI-container. 
This principle allows you to flexibly change the structure of the application by redefining the dependencies in each specific 
DI-container. In particular, it is possible to override dependencies, and to do so directly for the framework itself.

**Project pattern HMVC.**

The general project pattern diagram of GI can be found here...
https://raw.githubusercontent.com/igor1999/gi/master/docs/pattern.jpg

In this diagram, we see five horizontal layers...

...Persistence. A layer responsible for persistent storage of data (in an RDB for example).

...Business logic.

...View Models. Layer of models on which web forms are based.

...Controllers.

...View.

I would like to separately explain the functionality of the View-Model layer.

If we have a business object Person[int id, string firstName, string lastName], and we want to build a web interface for creating 
and editing this type of object, then the View Model will be the basis of the web form for creating such an object:
Person[string firstName, string lastName] <> --- Captcha[string id, string value].

And the web form for editing an existing business object will be based on the View Model: 
Person[string firstName, string lastName].

As you can see from the diagram, the View-Model layer is divided into two sub-layers: basic and extended models. 
Although it is necessary to create individual View Model for each web form, View Models designed to work with the same business object 
have a number of common attributes. And it makes sense to separate such common attributes into a certain base class 
(an abstract class as a rule). And all extended models will inherit from this base class.

E.g., in the above example, the extended models for the create and edit forms of the Person business object can inherit 
from the base model: Person[string firstName, string lastName].

The View-Model also has the following tasks:

...Recursively generating fully qualified names for a web form. For example, a name like captcha[value] from the above example.

...Recursive data filtering.

...Recursive data validation.

In addition to horizontal layers, we see a number of vertical rectangles in the diagram. These rectangles are components.

A component is a collection of PHP classes and other resources located in the same directory that is responsible for the creation 
and operation of a separate frame of a web document: menu, table, list, form, etc…

Also, one component can be an aggregator for other components. The most commonly used of these aggregators is the Layout component, 
which contains the components responsible for navigation, authorization and other things...

The component is responsible for the full cycle of functioning of its frame - from client events processed by java-scripts to writing 
to persistent storage.

However, as can be seen from the diagram, classes and resources belonging specifically to this component are in the lower 
two and a half layers. Classes from the top two and a half layers are outside the components and are called and used if required.

Also, I would like to talk a bit about such types of resources as java-scripts, css, images etc. All these resources responsible 
for the functioning of some frame or other are in the directory of the corresponding component.

However, each component is located inside its own module, and the modules lie outside the root directory of the web server. 
At the same time, the above resources need to be accessed via the web.

To solve this problem, symlinks are used. In the root directory of the web server, the GI application creates a directory, 
called “symlinks” by default, in which all symlinks to resources that require access via the web are created.

The GI\Component framework package contains a number of standard components that can be used either directly or as a basis 
for creating your own components needed in the current project.

**DOM objects.**

The GI\DOM package contains classes for rendering XML and HTML elements. Once we have instantiated such a class, we can configure it 
by setting the tag, attributes, classes, style attributes and so on, and then using the toString() * method to get the appropriate XML 
or HTML markup.

The above package contains classes that correspond to the main XML and HTML elements, attributes, text nodes and a host of others…

For example, this package has the Layout class, which allows you to automate the creation of a layout based on divs with 
the float property.

An important advantage when using such classes is the ability to reuse markup generator classes through inheritance, composition, etc... 
Therefore, when dealing with clearly structured views, such as tables, forms, lists, etc, it is better to use DOM classes.

* GI deliberately abandons the __toString() magic method. The reason is that an exception in this method results in an error.

**ORM.**

GI has its own quite simple and quite flexible ORM. This ORM is based on two classes: 
GI\RDB\ORM\AbstractRecord and GI\RDB\ORM\AbstractSet.

The first of these classes is the base for Record-classes working with a single SQL-query record.

The second class is the base for Set-classes - sets of instances of a specific Record-class.

Each Record class, by default, works with a record of a Relational Database (RDB) table. However, it is quite possible to make 
the Record class work with an arbitrary format SQL query record.

Record class methods allow both retrieving and modifying RDB information. In order to bind class properties and fields of 
an RDB table (or attributes of an SQL query), two descriptors for the PHP-docs of class methods are used:

@from-db [attribute] - the method with this descriptor receives, as an argument, the value of the specified attribute 
from the SQL query record.

However, the method does not have to be public. For example, if you want a certain property of a Record class to be set 
from the RDB, but without it being changed at the application level, you declare the corresponding setter as protected 
and use the above descriptor for it. For example:

/**

 *@from-db id

 *@param int id

 *@return self
 
 */
 
protected function setId($id)

This method sets the property of your Record object corresponding to the automatically generated primary key. Therefore, 
it is declared protected.

The next descriptor:

@to-db [field] - The purpose of this descriptor is the opposite of the previous one. A method with this descriptor returns 
a value to modify the database field specified in the descriptor. Such methods do not need to be public either.

The Record class has three methods for getting related Record and Set objects.

AbstractRecord::getRelatedRecord($class) – gets the associated Record Object corresponding to the RDB table referring 
to the current class table as 1:1 or that is parent table to the current class table.

AbstractRecord::getRelatedSet($class, $order = null) - gets the associated Set-Object corresponding to the RDB table that refers 
to the table of the current class as 1:N.

AbstractRecord::getRelatedSetByProxy($class, $proxyClass, $order = null) - gets a related Set-Object corresponding to an RDB table 
that refers to the current class table as M:N, where the intermediate table is mapped to the proxy class.

In order make getting related objects possible, it is necessary to use methods with a special descriptor:

@[related class] [related field]

Then, to obtain a related object of a certain class, all methods with a descriptor corresponding to this class are executed, 
and the values returned by these methods are mapped to the fields of the related table.

It is important to remember that in the case of the M:N relation, the proxy class and fields of the corresponding proxy table must be 
specified in descriptors, and methods with proxy class descriptors must also exist in the class corresponding to the returned 
Set-Object.

**I18n.**

Storages of literals in various languages (locales) in GI are .csv files with the separator “|“. This format was chosen because 
it is the most convenient for external translators.

.csv files are bound to Glossary classes. Each such class can aggregate a collection of file data.

The Translator framework class is directly responsible for translation. To execute the translation, an instance of this class requires: 
a reference to an object of the Glossary class, a source locale, a target locale. All of these parameters can be overridden 
by the object's setters.

By default, the source locale of the translator is en_GB, and the target locale is the so-called user locale.

The user locale is determined by the application based on the content of the request headers, cookies, and a specified list of locales 
used. An application-defined user locale is available through the framework's service locator. If the user locale could not be 
determined, the application sets it, by default,  to en_GB also.

The Translator::translate($text) method gets the source text and looks for a variant of that text in the target locale. 
If no such option is found, the method returns the original text.

Translation is mostly done between the default source and target locales. Therefore, the GI has a functionality allowing you to go 
without creating objects of the Translator class.

The service locator of the framework has a method translate($glossaryInterface, $glossaryClassOrInstance, $text) In the trait 
of the service locator, this method, to simplify the syntax, is called by the giTranslate() method with a similar signature. 
The arguments to this method:

$glossaryInterface is the interface of the Glossary class.

$glossaryClassOrInstance is, indeed, the Glossary-class or its instance.

$text is the original text.

The method looks for a dependency on the $glossaryInterface in the DI-container, using $glossaryClassOrInstance as the default value.

Once it finds Glossary, the method installs it into the standard translator of the service locator and performs the translation.

However, sometimes it is necessary to translate from... or to another locale besides the default ones, or to change other translator 
settings. In this case, the service locator method createDefaultTranslator($glossaryInterface, $glossaryClassOrInstance) allows you 
to return an instance of the translator with the given Glossary. The latter is searched, similarly to the previous one, through 
the DI-container. And then, the developer has the ability to change various settings of the resulting translator.

Another feature of working with i18n in GI is the use of main locales. A certain main locale is selected for each language. 
For example, en_GB for English, de_DE for German, etc. By default, the translator not only tries to translate the text from the source 
locale to the target, but, in case of failure, makes attempts to successively replace the source and target locales, respectively, 
into the main locales of their languages.

This principle is used because locales of the same language have a lot of common words. For example, en_GB, en_US, en_AU, en_CA... 
These are all dialects of the English language and most of their words are the same.

In order not to duplicate the same words repeatedly, the same words of different locales of the same language can be taken out 
to the main locale.

The list of main locales is specified in the framework, and can be changed via the DI-container.

Among the framework components, there is a standard Locales component. This component allows you to select the user current locale 
through the drop-down list. The current locale, in this case, is recorded in cookies.

**Sessions.**

The ideology of GI when working with sessions is as follows:

All session data are part of the state of certain classes, the functioning of which requires the preservation of this part of the state 
between requests.

The task of the GI application is to organize the exchange of data between the session and the classes requiring such an exchange.

Therefore, at the beginning of its work, the application loads data from the session into the appropriate classes, 
for which the property of these classes, private static $sessionCache, is used (the name of the property is reserved).

Then, the classes and their instances have the ability to change the contents of the above session cache.

And at the end of the work, the application performs the opposite procedure, shifting data from classes into the session.

The task of the developer, in this case, is to transfer to the GI application a list of classes that need to exchange data 
with the session. The way this is transferred depends on the type of application: module-based or microservice.

**Socket Demon (not stable).**

This package provides a generic interface between the client and the server side of a web socket based application.

Through this package, you can start an endless process (daemon) that opens and closes client sockets, and, accordingly, 
reads and writes messages between the client and the server through them.

The message received by the daemon from the client via the socket is sent to the server part of the application using 
the back-tick operator. The result of executing the back-tick operator, in turn, may contain the server’s response, 
which the daemon passes back through the socket to the client.

The functionality of this package is absolutely invariant relative to the functionality of the client or server part of the application 
used. It is sufficient, through the DI-container, to make the necessary settings (e.g. a script executed by a back-tick operator) 
so that Socket Demon will work effectively with any user application.

And now, some features of this package:

It is possible to validate a newly opened connection. This means that, after a certain period of time from its being opened, 
the client must send some authentication data, and the server must confirm them. If confirmation does not take place 
within the specified time interval, this connection is closed.

The possibility of a so-called push call. From the above, it follows that information from the server to the client leaves only 
as a result of a request from the client. At the same time, the daemon itself can, without client calls, periodically send a request 
to the server side of the application and send the clients the information intended for them.

**Command line interface and background processes.**

The GI includes a functionality designed to launch processes from the command line or background processes running from a web application. 
To handle such processes, you need to create a separate entry point in the bootstrap directory, and use the appropriate application class 
and call-objects.

The GI also contains the GI\CLI package, the classes of which are responsible for various aspects of performing the tasks addressed 
in this section.

The most important of the GI\CLI subpackages is GI\CLI\CommandLine. The classes of this subpackage are able to...

...read command-line arguments and build a collection of corresponding PHP objects from them.

...edit said collection.

...compile a collection of arguments and get a command string from them.

...run the received execute command both synchronously using backtick operator, and asynchronously using popen().

Any call-object creates a CommandLine class object and downloads the content of the $_SERVER['argv'] array into it. 
The created object is accessible via the Service Locator.

An important feature of these classes is the ability to create and read so-called named arguments, i.e. type arguments...

@name=value

CommandLine classes parse this argument, after which it becomes possible to access it both by serial number in the list and by name.

There are a number of fixed names for named arguments: route, session, job, demon. For these named arguments, there are also 
corresponding accessors.

Another option provided by the CommandLine package is to pass on arguments in base64 format. The format of such arguments looks as follows:

@(64)name=encoded-value

or

(64)encoded-value

Upon receiving such an argument, CommandLine performs an operation to decode its value.

The ID of the current session can be passed on in the arguments of the process running. This is done using the named argument “session”. 
The CLI Call-Object always checks whether the given named argument is in the argument list, and if it is, the current session is restored 
by means of its value. This means that a process running from a web application can access the same session as the application running it.

The GI\CLI\Job subpackage is designed to run background processes and interactively get their status. 

Performing background processes is often necessary in PHP applications because the functionality needed by the application requires too many 
resources and cannot be implemented in a single request.

There are special services, such as Rabbit MQ, that allow you to perform such background processes. However, in the GI this feature 
is built-in and very easy to implement.

By redefining the two abstract base classes, you can get all the functionality you need to perform the background process. Moreover...

...the data required by this process can be stored in a session and is accessible for viewing by the web application. 
This means the web application can always see what stage the task being performed by the process is at and display this on the client, 
using the progress bar for example.

...the process can recursively restart itself. The latter is needed to divide an overly large task into many relatively small parts 
and perform them one by one.

For example, if a process needs to send emails to several thousand users whose data is stored in an RDB, the process can send emails 
to 100 users at a time, remember the current offset in the session, and restart itself. And do so until the next request to the RDB 
returns an empty set of users.