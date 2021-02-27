<?php

namespace GITest\Markup\Renderer;

use GI\Exception\MagicMethod as MagicMethodException;
use GI\Exception\NotGiven as NotGivenException;
use GI\Exception\InvalidType as InvalidTypeException;

use PHPUnit\Framework\TestCase;
use GITest\Markup\Renderer\Fake\View;
use GI\FileSystem\FSO\FSOFile\FSOFile;
use GI\Meta\Method\Collection\Alterable as MethodCollection;
use GI\Storage\Collection\MixedCollection\HashSet\Alterable\Alterable as Params;
use GI\Meta\ClassMeta\ClassMeta;
use GI\Util\TextProcessing\Escaper\Factory\Container\Container as EscaperContainer;
use GI\Util\TextProcessing\TextProcessor\MarkupTextProcessor;
use GI\REST\URL\Builder\Builder as URLBuilder;
use GI\DOM\Factory\Factory as DOMFactory;

class RendererTest extends TestCase
{
    /**
     * @var MethodCollection
     */
    private $methodCollection;

    /**
     * @var
     */
    private $templateContents;


    protected function setUp():void
    {
        $this->methodCollection = (new ClassMeta(View::class))->getMethods();

        $file = __DIR__ . '/Fake/template/template.phtml';
        $this->templateContents = file_get_contents($file);
    }

    protected function createView()
    {
        return new View();
    }

    /**
     * @throws \Exception
     */
    public function testGetTemplate()
    {
        $view = $this->createView();

        $template = $this->methodCollection->get('getTemplate')->execute($view);

        $this->assertInstanceOf(FSOFile::class, $template);
        $this->assertEquals(
            __DIR__ . DIRECTORY_SEPARATOR . 'Fake/template/template.phtml', $template->toString()
        );
    }

    public function testGetEscaperContainer()
    {
        $view = $this->createView();

        $this->assertInstanceOf(EscaperContainer::class, $view->getEscaperContainer());
    }

    public function testGetMarkupTextProcessor()
    {
        $view = $this->createView();

        $this->assertInstanceOf(MarkupTextProcessor::class, $view->getMarkupTextProcessor());
    }

    public function testGetDOMFactory()
    {
        $view = $this->createView();

        $this->assertInstanceOf(DOMFactory::class, $view->getDOMFactory());
    }

    /**
     * @throws \Exception
     */
    public function testGetUrlBuilder()
    {
        $view = $this->createView();

        $this->assertInstanceOf(
            URLBuilder::class, $this->methodCollection->get('getUrlBuilder')->execute($view)
        );
    }

    /**
     * @throws \Exception
     */
    public function testGetParams()
    {
        $view = $this->createView();

        $this->assertInstanceOf(
            Params::class, $this->methodCollection->get('getParams')->execute($view)
        );
    }

    /**
     * @throws \Exception
     */
    public function testCall()
    {
        $view = $this->createView();

        /** @var Params $params */
        $params = $this->methodCollection->get('getParams')->execute($view);

        $view->__call('setTest', [1]);
        $this->assertEquals(['test' => 1], $params->getItems());

        $this->assertEquals(1, $view->__call('getTest'));

        $view->__call('setTest', [true]);
        $this->assertEquals(['test' => true], $params->getItems());

        $this->assertTrue($view->__call('isTest'));

        $this->expectException(MagicMethodException::class);
        $view->__call('f');
    }

    /**
     * @throws \Exception
     */
    public function testCall2()
    {
        $view = $this->createView();

        $this->expectException(NotGivenException::class);
        $view->__call('setTest');
    }

    /**
     * @throws \Exception
     */
    public function testToString()
    {
        $view = $this->createView();

        $this->assertEquals($this->templateContents, $view->toString());

        $this->methodCollection->get('setTemplateByClass')->execute($view, [View::class, 'template']);

        $this->expectException(InvalidTypeException::class);
        $view->toString();
    }

    /**
     * @throws \Exception
     */
    public function testSave()
    {
        $file = __DIR__ . '/Fake/template/template2.phtml';
        file_put_contents($file, '');

        $view = $this->createView();
        $view->save(new FSOFile($file));

        $this->assertEquals($this->templateContents, file_get_contents($file));
    }
}