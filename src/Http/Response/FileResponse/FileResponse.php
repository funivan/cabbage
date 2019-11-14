<?php

declare(strict_types=1);

namespace Funivan\CabbageCore\Http\Response\FileResponse;

use Funivan\CabbageCore\Fs\File\FileInterface;
use Funivan\CabbageCore\Http\Response\Body\BodyInterface;
use Funivan\CabbageCore\Http\Response\Headers\Field;
use Funivan\CabbageCore\Http\Response\Headers\Headers;
use Funivan\CabbageCore\Http\Response\HeadersInterface;
use Funivan\CabbageCore\Http\Response\Plain\PlainBody;
use Funivan\CabbageCore\Http\Response\ResponseInterface;
use Funivan\CabbageCore\Http\Response\Status\ResponseStatus;
use Funivan\CabbageCore\Http\Response\StatusInterface;
use Mimey\MimeTypes;

/**
 *
 */
class FileResponse implements ResponseInterface
{

    /**
     * @var FileInterface
     */
    private $file;

    /**
     * @var HeadersInterface
     */
    private $headers;


    /**
     * @param FileInterface $file
     * @param HeadersInterface $headers
     */
    private function __construct(FileInterface $file, HeadersInterface $headers)
    {
        $this->file = $file;
        $this->headers = $headers;
    }


    /**
     * @param FileInterface $image
     * @return ResponseInterface
     */
    public static function createViewable(FileInterface $image): ResponseInterface
    {
        return new self($image, new Headers([]));
    }


    /**
     * @param FileInterface $image
     * @return ResponseInterface
     */
    public static function createDownloadable(FileInterface $image): ResponseInterface
    {
        $headers = new Headers([
            new Field('Content-Disposition', 'attachment; filename=' . basename($image->path()->assemble())),
            new Field('Content-Description', ' File Transfer'),
            new Field('Content-Transfer-Encoding', ' binary'),
            new Field('Connection', ' Keep-Alive'),
            new Field('Expires', ' 0'),
            new Field('Cache-Control', ' must-revalidate, post-check=0, pre-check=0'),
            new Field('Pragma', ' public'),
        ]);
        return new self($image, $headers);
    }


    /**
     * @return StatusInterface
     */
    final public function status(): StatusInterface
    {
        return new ResponseStatus(200);
    }


    /**
     * @return HeadersInterface
     */
    final public function headers(): HeadersInterface
    {
        return (new Headers([
            new Field('Content-Type', (string)(new MimeTypes)->getMimeType($this->file->meta('extension'))),
        ]))->merge($this->headers);
    }


    /**
     * @return BodyInterface
     * @todo make more effective image download
     *
     */
    final public function body(): BodyInterface
    {
        return new PlainBody($this->file->read());
    }

}