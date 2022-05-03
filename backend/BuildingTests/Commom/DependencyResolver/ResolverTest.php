<?php

namespace Tests\Commom\DependencyResolver;

use ReflectionClass;
use Commom\DependencyResolver\ResolverException;
use Commom\DependencyResolver\Resolver;

use Tests\Commom\DependencyResolver\Mocks\MockInterface1;
use Tests\Commom\DependencyResolver\Mocks\MockInterface2;
use Tests\Commom\DependencyResolver\Mocks\MockInterface3;

use Tests\Commom\DependencyResolver\Mocks\MockClass1;
use Tests\Commom\DependencyResolver\Mocks\MockClass2;
use Tests\Commom\DependencyResolver\Mocks\MockClass3;
use Tests\Commom\DependencyResolver\Mocks\MockClassOverwrite;

class ResolverTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @test
     * @covers \Commom\DependencyResolver\Resolver
     */
    public function testResolverSuccess()
    {
        $reflectionClass = new ReflectionClass(Resolver::class);
        $reflectionClass->getProperty('implementations')->setAccessible(true);

        $resolver = $reflectionClass->newInstanceWithoutConstructor();
        $reflectionClass->getProperty('implementations')->setValue($resolver, [
            MockInterface1::class => MockClass1::class,
            MockInterface2::class => MockClass2::class,
            MockInterface3::class => MockClass3::class,
        ]);

        $resolved = $resolver->resolve([
            MockInterface1::class,
            MockInterface2::class,
            MockInterface3::class,
        ]);

        $this->assertInstanceOf(MockClass1::class, $resolved[MockInterface1::class]);
        $this->assertInstanceOf(MockClass2::class, $resolved[MockInterface2::class]);
        $this->assertInstanceOf(MockClass3::class, $resolved[MockInterface3::class]);
    }

    /**
     * @test
     * @covers \Commom\DependencyResolver\Resolver
     */
    public function testResolverException()
    {
        $reflectionClass = new ReflectionClass(Resolver::class);
        $reflectionClass->getProperty('implementations')->setAccessible(true);

        $resolver = $reflectionClass->newInstanceWithoutConstructor();
        $reflectionClass->getProperty('implementations')->setValue($resolver, [
            MockInterface1::class => MockClass1::class,
            MockInterface2::class => MockClass2::class,
        ]);

        $this->expectException(ResolverException::class);

        $resolved = $resolver->resolve([
            MockInterface1::class,
            MockInterface2::class,
            MockInterface3::class,
        ]);

        $this->assertInstanceOf(MockClass1::class, $resolved[MockInterface1::class]);
        $this->assertInstanceOf(MockClass2::class, $resolved[MockInterface2::class]);
    }

    /**
     * @test
     * @covers \Commom\DependencyResolver\Resolver
     */
    public function testResolverCompletingIncompleteimplementations()
    {
        $reflectionClass = new ReflectionClass(Resolver::class);
        $reflectionClass->getProperty('implementations')->setAccessible(true);

        $resolver = $reflectionClass->newInstanceWithoutConstructor();
        $reflectionClass->getProperty('implementations')->setValue($resolver, [
            MockInterface1::class => MockClass1::class,
            MockInterface2::class => MockClass2::class,
        ]);

        $resolved = $resolver->resolve([
            MockInterface1::class,
            MockInterface2::class,
            MockInterface3::class,
        ],
        [
            MockInterface3::class => MockClass3::class,
        ]);

        $this->assertInstanceOf(MockClass1::class, $resolved[MockInterface1::class]);
        $this->assertInstanceOf(MockClass2::class, $resolved[MockInterface2::class]);
    }

    /**
     * @test
     * @covers \Commom\DependencyResolver\Resolver
     */
    public function testResolverOverwritingimplementations()
    {
        $reflectionClass = new ReflectionClass(Resolver::class);
        $reflectionClass->getProperty('implementations')->setAccessible(true);

        $resolver = $reflectionClass->newInstanceWithoutConstructor();
        $reflectionClass->getProperty('implementations')->setValue($resolver, [
            MockInterface1::class => MockClass1::class,
            MockInterface2::class => MockClass2::class,
            MockInterface3::class => MockClass3::class,
        ]);

        $resolved = $resolver->resolve([
            MockInterface1::class,
            MockInterface2::class,
            MockInterface3::class,
        ],
        [
            MockInterface2::class => MockClassOverwrite::class,
        ]);

        $this->assertInstanceOf(MockClass1::class, $resolved[MockInterface1::class]);
        $this->assertInstanceOf(MockClassOverwrite::class, $resolved[MockInterface2::class]);
        $this->assertInstanceOf(MockClass3::class, $resolved[MockInterface3::class]);
    }
}